<?php
include '../db.php';

class Customer {
    private $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }

    public function addCustomer($name, $email, $phoneNumber) {
        $query = "INSERT INTO customers (name, email, phone_number) VALUES ('$name', '$email','$phoneNumber')";
    }
}
?>

