<?php
require_once 'models/Product.php';
require_once 'models/Supplier.php';

class ProductController {
    private $model;
    private $supplierModel;

    public function __construct() {
        $this->model = new Product();
        $this->supplierModel = new Supplier();
    }

    public function index() {
        $name = $_GET['name'] ?? '';
        $fid = $_GET['supplier_id'] ?? null;

        $products = $this->model->getAll($name, $fid);
        $suppliers = $this->supplierModel->getAll();
        
        require 'views/product/index.php';
    }

    public function create() {
        $suppliers = $this->supplierModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $fids = $_POST['suppliers'] ?? [];
            $this->model->create($name, $price, $description, $fids);
            header("Location: index.php?action=product_index");
        } else {
            require 'views/product/create.php';
        }
    }

    public function edit($id) {
        $suppliers = $this->supplierModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name = $_POST['name'];
            $description = $_POST['description'] ?? '';
            $price = $_POST['price'] ?? '';
            $fids = $_POST['suppliers'] ?? [];
            $this->model->update($id, $name, $price, $description, $fids);
            header("Location: index.php?action=product_index");
        } else {
            $product = $this->model->getById($id);
            $selecteds = $this->model->getSuppliers($id);
            require 'views/product/edit.php';
        }
    }

    public function delete() {
        $id = $_GET['id'];
        $this->model->delete($id);
        header("Location: index.php?action=product_index");
    }

    public function deleteMultiple() {
        $ids = $_POST['ids'] ?? [];
        $this->model->deleteMultiple($ids);
        header("Location: index.php?action=product_index");
    }
}