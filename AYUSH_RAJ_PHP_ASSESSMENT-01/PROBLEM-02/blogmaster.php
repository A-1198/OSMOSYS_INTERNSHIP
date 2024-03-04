<?php

class Post {
    private $title;
    private $content;
    private $author;
    private $publicationDateTime;

    public function __construct($title, $content, $author) {
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->publicationDateTime = date('Y-m-d H:i:s'); 
    }

    public function getTitle() {
        return $this->title;
    }

    public function getContent() {
        return $this->content;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function getPublicationDateTime() {
        return $this->publicationDateTime;
    }
}

class BlogPostManager {
    public $postsFile = 'blog_posts.txt';

    public function createPost($post) {
        $this->loadPosts();
        $this->posts[] = $post;
        $this->savePosts();
    }

    public function displayAllPosts() {
        $this->loadPosts();

        if (empty($this->posts)) {
            echo "No blog posts available.";
        } else {
            foreach ($this->posts as $post) {
                $this->displayPost($post);
                echo "<hr/>";
            }
        }
    }

    private function loadPosts() {
        $postsData = file_get_contents($this->postsFile);
        if ($postsData !== false) {
            $postsArray = unserialize($postsData);
            if (is_array($postsArray)) {
                $this->posts = $postsArray;
            }
        }
    }

    private function savePosts() {
        file_put_contents($this->postsFile, serialize($this->posts));
    }

    private function displayPost($post) {
        echo "Title: " . $post->getTitle() . "<br/>";
        echo "Content: " . $post->getContent() . "<br/>";
        echo "Author: " . $post->getAuthor() . "<br/>";
        echo "Publication Date and Time: " . $post->getPublicationDateTime() . "<br/>";
    }
}

$blogPostManager = new BlogPostManager();

$newPost1 = new Post('PHP', 'Php is a user friendly language', 'Ayush Raj');
$blogPostManager->createPost($newPost1);

$newPost2 = new Post('PHP - 2', 'Php is a used in backend', 'Jaideep Singh');
$blogPostManager->createPost($newPost2);

$newPost3 = new Post('PHP - 3', 'Php uses $ for vairables', 'M sushanth');
$blogPostManager->createPost($newPost3);

$blogPostManager->displayAllPosts();

?>