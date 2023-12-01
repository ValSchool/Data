<?php

include 'db.php';

$database = new Database();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $column1 = $_POST["column1"];
    $column2 = $_POST["column2"];
    $column3 = $_POST["column3"];

    $database->updateData($id, $column1, $column2, $column3);
}