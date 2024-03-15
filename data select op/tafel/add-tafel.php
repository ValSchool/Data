<?php
include '../db.php';
require_once('tafel.php');

class AddTafel {
    private $db;
    private $tafel;
    
    public function __construct() {
        $this->db = new DB();
        $this->tafel = new Tafel();
    }

    public function voegTafelToe($tafelnaam) {
        $query = "INSERT INTO tafels (naam) VALUES ('$tafelnaam')";
    }
}
$addTafel = new AddTafel();
$addTafel->voegTafelToe("Nieuwe Tafel");
?>
