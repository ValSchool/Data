<?php
require_once 'db.php';
include 'add-reservering.php'
class Reservering {
    private $conn;

    public function __construct() {
        $database = new DB();
        $this->conn = $database->connect();
    }

    public function getAllReserveringen() {
        $query = "SELECT * FROM reservering";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }

    public function addReservering($data) {
        $query = "INSERT INTO reservering (klant_id, tafel_id, datum, tijd) VALUES (:klant_id, :tafel_id, :datum, :tijd)";
        $stmt = $this->conn->pdo->prepare($query);
        $stmt->bindParam(':klant_id', $data['klant_id']);
        $stmt->bindParam(':tafel_id', $data['tafel_id']);
        $stmt->bindParam(':datum', $data['datum']);
        $stmt->bindParam(':tijd', $data['tijd']);

        return $stmt->execute();
    }
}
?>