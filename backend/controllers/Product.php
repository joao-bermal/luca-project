<?php

require_once './models/Product.php';

class ProductController {
    private $productModel;

    public function __construct() {
        $this->productModel = new Product();
    }

    public function getProducts() {
        $products = $this->productModel->getAll();
        echo json_encode($products);
    }

    public function getProduct($id) {
        $product = $this->productModel->getById($id);
        echo json_encode($product);
    }

    public function createProduct() {
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $this->productModel->create($data);
        echo json_encode(['id' => $id]);
    }

    public function updateProduct($id) {
        $data = json_decode(file_get_contents('php://input'), true);
        $count = $this->productModel->update($id, $data);
        echo json_encode(['updated' => $count]);
    }

    public function deleteProduct($id) {
        $count = $this->productModel->delete($id);
        echo json_encode(['deleted' => $count]);
    }
}