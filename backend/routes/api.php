<?php

require_once './controllers/Product.php';

$controller = new ProductController();

$request_path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

switch ($request_path) {
    case "/add":
        $controller->createProduct();
        break;
    case "/update":
        // parse_str(file_get_contents('php://input'), $putVars);
        // $controller->updateProduct($putVars["id"]);
        $controller->updateProduct();
        break;
    case "/delete":
        parse_str(file_get_contents('php://input'), $deleteVars);
        $controller->deleteProduct($deleteVars["id"]);
        break;
    case "/product":
        $controller->getProduct($_GET["id"]);
        break;
    case "/products":
        $controller->getProducts();
        break;
    default:
        header("HTTP/1.1 405 Method Not Allowed");
        break;
}