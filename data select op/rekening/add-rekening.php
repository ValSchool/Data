<?php
require_once '../db.php';
require_once 'rekening.php';

class AddRekening {
    private $db;
    private $rekening;

    public function __construct() {
        $this->db = new DB('dbdb', 'localhost', 'root', ' ');
        $this->rekening = new Rekening($this->db);
    }

    public function addAccount($amount, $customerId) {
        $query = "INSERT INTO accounts (amount, customer_id) VALUES ('$amount', '$customerId')";   
        $this->db->execute($query);
    }
}

$addAccount = new AddRekening();
$addAccount->addAccount(100.00, 1);
