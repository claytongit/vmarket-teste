<?php
require_once 'config/database.php';

class Product {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll($name = '', $supplierId = null) {
        $sql = "SELECT p.id, p.name, p.price, GROUP_CONCAT(f.name SEPARATOR ', ') AS suppliers
                FROM products p
                LEFT JOIN product_supplier pf ON p.id = pf.products_id
                LEFT JOIN suppliers f ON pf.supplier_id = f.id
                WHERE p.name LIKE :name";

        if ($supplierId) {
            $sql .= " AND pf.supplier_id = :fid";
        }
        $sql .= " GROUP BY p.id ORDER BY p.name";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':name', "%$name%");
        if ($supplierId) {
            $stmt->bindValue(':fid', $supplierId);
        }
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM products WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getSuppliers($id) {
        $stmt = $this->db->prepare("SELECT supplier_id FROM product_supplier WHERE products_id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function create($name, $price, $description, $suppliers) {
        $this->db->beginTransaction();
        $stmt = $this->db->prepare("INSERT INTO products (name, price, description) VALUES (:name, :price, :description)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':description', $description);
        $stmt->execute();
        $productId = $this->db->lastInsertId();
        $this->linkSuppliers($productId, $suppliers);
        $this->db->commit();
    }

    public function update($id, $name, $price, $description, $suppliers) {
        $this->db->beginTransaction();
        $stmt = $this->db->prepare("UPDATE products SET name = :name, price = :price, description = :description WHERE id = :id");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':price', $price);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        $this->db->prepare("DELETE FROM product_supplier WHERE products_id = ?")->execute([$id]);
        $this->linkSuppliers($id, $suppliers);
        $this->db->commit();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM products WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function deleteMultiple($ids) {
        $in = str_repeat('?,', count($ids) - 1) . '?';
        $stmt = $this->db->prepare("DELETE FROM products WHERE id IN ($in)");
        return $stmt->execute($ids);
    }

    private function linkSuppliers($productId, $suppliers) {
        $stmt = $this->db->prepare("INSERT INTO product_supplier (products_id, supplier_id) VALUES (?, ?)");
        foreach ($suppliers as $fid) {
            $stmt->execute([$productId, $fid]);
        }
    }
}

