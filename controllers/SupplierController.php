<?php

require_once 'models/Supplier.php';

class SupplierController {
    private $model;

    public function __construct() {
        $this->model = new Supplier();
    }

    public function index() {
        $name = $_GET['name'] ?? '';
        
        $suppliers = $this->model->getAll($name);
        require 'views/supplier/index.php';
    }

    public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $cnpj = $_POST['cnpj'] ?? '';
            $cep = $_POST['cep'] ?? '';
            $address = $_POST['address'] ?? '';
            $number = $_POST['number'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';
            
            try {
                $this->model->create($name, $description, $cnpj, $cep, $address, $number, $city, $state);
                header("Location: index.php?action=supplier_index");
            } catch (PDOException $e) {
                if ($e->errorInfo[1] == 1062) {
                    header("Location: index.php?action=supplier_index&error=supplier_cnpj_exists");
                } else {
                    header("Location: index.php?action=supplier_index&error=db_error");
                }
                exit;
            }
        } else {
            require 'views/supplier/create.php';
        }
    }

    public function edit($id) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'] ?? '';
            $description = $_POST['description'] ?? '';
            $cnpj = $_POST['cnpj'] ?? '';
            $cep = $_POST['cep'] ?? '';
            $address = $_POST['address'] ?? '';
            $number = $_POST['number'] ?? '';
            $city = $_POST['city'] ?? '';
            $state = $_POST['state'] ?? '';

            $this->model->update($id, $name, $description, $cnpj, $cep, $address, $number, $city, $state);
            header("Location: index.php?action=supplier_index");
        } else {
            $supplier = $this->model->getById($id);
            require 'views/supplier/edit.php';
        }
    }

    public function deleteMultiple() {
        $ids = $_POST['ids'] ?? [];
        $this->model->deleteMultiple($ids);
        header("Location: index.php?action=supplier_index");
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header("Location: index.php?action=supplier_index");
    }
}