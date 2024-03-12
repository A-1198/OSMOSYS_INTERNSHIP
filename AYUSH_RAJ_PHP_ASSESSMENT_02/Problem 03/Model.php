<?php

class PracticeModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Adds a new product 
     * @param string $name : The name of product
     * @param string $description : description of product
     * @param float $price : price of product
     */
    public function insertRecord($name, $description, $price) {
        try {
            $stmtInsert = $this->pdo->prepare("INSERT INTO products(name,description,price) VALUES (:name, :description,:price)");

            
            $stmtInsert->bindParam(':name', $name);
            $stmtInsert->bindParam(':description', $description);
            $stmtInsert->bindParam(':price',$price);
            
            $stmtInsert->execute();

            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Updates an existing product 
     * @param int id ; id of product
     * @param string $name : The name of product
     * @param string $description : description of product
     * @param float $price : price of product
     */

    public function UpdateRecord($id,$name,$description,$price) 
    {
        try {
            $stmtUpdate = $this->pdo->prepare("UPDATE products SET name=:name,description=:description,price=:price WHERE id=:id");
            $stmtUpdate->bindParam(':id',$id);
            $stmtUpdate->bindParam(':name', $name);
            $stmtUpdate->bindParam(':description', $description);
            $stmtUpdate->bindParam(':price',$price);
            $stmtUpdate->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }

    /**
     * Deletes a product 
     * @param int id ; id of product
     */

    public function DeleteRecord($id) 
    {
        try {
            $stmtDelete = $this->pdo->prepare("DELETE FROM products WHERE id=:id");
            $stmtDelete->bindParam(':id',$id);
            $stmtDelete->execute();
            return true;
        } catch(PDOException $e) {
            return false;
        }
    }


    /**
     * Fetches all products 
     * @return array Returns an array of all products
     */
    public function getAllRecords() {
        try {
            $stmtSelect = $this->pdo->prepare("SELECT * FROM products");
            $stmtSelect->execute();
            return $stmtSelect->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }
    }
}
?>
