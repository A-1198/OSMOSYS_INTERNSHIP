-<?php
class User {
    private $username;
    private $password;

    public function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function verifyPassword($password) {
        return ($password === $this->password);
    }
}

class UserAuthentication {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function registerUser($username, $password) {
        $user = new User($username, $password);
        $data = json_encode(['username' => $user->getUsername(), 'password' => $user->getPassword()]) . PHP_EOL;
       
        if (file_put_contents($this->filePath, $data) === false) {
            throw new Exception('Unable to register user.');
        }
    }

    public function loginUser($username, $password) {
        $lines = file($this->filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
       
        foreach ($lines as $line) {
            $userData = json_decode($line, true);

            if ($userData && $userData['username'] === $username) {
                $user = new User($userData['username'], $userData['password']);

                if ($user->verifyPassword($password)) {
                    return true;
                } else {
                    throw new Exception('Incorrect password.');
                }
            }
        }

        throw new Exception('User not found.');
    }
}

$userAuthentication = new UserAuthentication('users.txt');
try {
    $userAuthentication->registerUser('ayush', 'password123');
    $userAuthentication->registerUser('vrushali', 'password456');

    if ($userAuthentication->loginUser('jaideep', 'password456')) {
        echo 'Login successful for ayush';
    } else {
        echo 'Login failed for ayush';
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
}
?>