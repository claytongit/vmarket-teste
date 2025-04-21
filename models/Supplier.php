<?php
require_once "config/database.php";

class Supplier {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function getAll($name = '') {
        $stmt = $this->db->prepare("SELECT * FROM suppliers WHERE name LIKE :name ORDER BY name ASC");
        $stmt->bindValue(':name', "%$name%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function search($name) {
        $stmt = $this->db->prepare("SELECT * FROM suppliers WHERE name LIKE :name");
        $stmt->bindValue(':name', "%$name%");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM suppliers WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($name, $description, $cnpj, $cep, $address, $number, $city, $state) {
        $stmt = $this->db->prepare("INSERT INTO suppliers (name, description, cnpj, cep, address, number, city, state) VALUES (:name, :description, :cnpj, :cep, :address, :number, :city, :state)");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':description', $description);
        $stmt->bindValue(':cnpj', $cnpj);
        $stmt->bindValue(':cep', $cep);
        $stmt->bindValue(':address', $address);
        $stmt->bindValue(':number', $number);
        $stmt->bindValue(':city', $city);
        $stmt->bindValue(':state', $state);
        return $stmt->execute();
    }

    public function update($id, $name, $description, $cnpj, $cep, $address, $number, $city, $state) {
        $stmt = $this->db->prepare("UPDATE suppliers SET name = :name, description = :description, cnpj = :cnpj, cep = :cep, address = :address, number = :number, city = :city, state = :state WHERE id = :id");
        $stmt->bindValue(':name', $name);
        $stmt->bindValue('description', $description);
        $stmt->bindValue('cnpj', $cnpj);
        $stmt->bindValue('cep', $cep);
        $stmt->bindValue('address', $address);
        $stmt->bindValue('number', $number);
        $stmt->bindValue('city', $city);
        $stmt->bindValue('state', $state);
        $stmt->bindValue('id', $id);
        return $stmt->execute();
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM suppliers WHERE id = :id");
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function deleteMultiple($ids) {
        $in = str_repeat('?,', count($ids) - 1) . '?';
        $stmt = $this->db->prepare("DELETE FROM suppliers WHERE id IN ($in)");
        return $stmt->execute($ids);
    }
}