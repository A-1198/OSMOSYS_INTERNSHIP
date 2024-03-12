<?php

require_once 'Model.php';

class PracticeController {
    private $model;

    public function __construct($pdo) {
        $this->model = new PracticeModel($pdo);
    }

    public function insertRecord($name, $description,$price) {
        return $this->model->insertRecord($name, $description,$price);
    }

    public function updateRecord($id,$name, $description,$price) {
        return $this->model->updateRecord($id,$name,$description,$price);
    }

    public function DeleteRecord($id) {
        return $this->model->DeleteRecord($id);
    }

    public function getAllRecords() {
        return $this->model->getAllRecords();
    }
}
?>