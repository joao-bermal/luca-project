<?php

require_once './config/Database.php';

class Product {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function getAll() {
        $query = "SELECT * FROM Product";
        $stmt = $this->conn->query($query);

        return $stmt->fetchAll();
    }

    public function getById($id) {
        $query = "SELECT * FROM Product WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data) {
        $query = "INSERT INTO Product (sku, name, price, type, properties) VALUES (:sku, :name, :price, :type, :properties)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":sku", $data["sku"]);
        $stmt->bindParam(":name", $data["name"]);
        $stmt->bindParam(":price", $data["price"]);
        $stmt->bindParam(":type", $data["type"]);
        $stmt->bindParam(":properties", json_encode($data["properties"]));
        $stmt->execute();

        return $this->conn->lastInsertId();
    }

    public function update($id, $data) {
        $query = "UPDATE Product SET sku = :sku, name = :name, price = :price, type = :type, properties = :properties WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":sku", $data["sku"]);
        $stmt->bindParam(":name", $data["name"]);
        $stmt->bindParam(":price", $data["price"]);
        $stmt->bindParam(":type", $data["type"]);
        $stmt->bindParam(":properties", json_encode($data["properties"]));
        $stmt->execute();

        return $stmt->rowCount();
    }

    public function delete($id) {
        $query = "DELETE FROM Product WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->rowCount();
    }
}