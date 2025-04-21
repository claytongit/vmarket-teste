<?php 
$action = $_GET['action'] ?? 'supplier_index';
$id = $_GET['id'] ?? null;

require_once 'controllers/SupplierController.php';
require_once 'controllers/ProductController.php';

switch ($action) {
    case 'supplier_index':
        (new SupplierController())->index();
        break;
    case 'supplier_create':
        (new SupplierController())->create();
        break;
    case 'supplier_edit':
        (new SupplierController())->edit($id);
        break;
    case 'supplier_delete_multiple':
        (new SupplierController())->deleteMultiple();
        break;
    case 'supplier_delete':
        (new SupplierController())->delete();
        break;
    case 'product_index':
        (new ProductController())->index();
        break;
    case 'product_create':
        (new ProductController())->create();
        break;
    case 'product_edit':
        (new ProductController())->edit($id);
        break;
    case 'product_delete_multiple':
        (new ProductController())->deleteMultiple();
        break;
    case 'product_delete':
        (new ProductController())->delete();
        break;
}