<?php

include 'db.php';

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    
    $database->deleteData($id);
}