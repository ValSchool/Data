<?php
require_once('product.php');

class InsertProduct {
    private $db;
    private $product;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    public function addProduct($name, $price) {
        $query = "INSERT INTO products (name, price) VALUES ('$name', '$price')";
    }
}

$insertProduct = new InsertProduct(new $DB());
$insertProduct->addProduct("New Product", 19.99);
?>
