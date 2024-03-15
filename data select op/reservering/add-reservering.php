<?php
require_once 'reservering.php';
include '../db.php'

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $klantId = isset($_POST['klant_id']) ? intval($_POST['klant_id']) : null;
    $tafelId = isset($_POST['tafel_id']) ? intval($_POST['tafel_id']) : null;
    $datum = isset($_POST['datum']) ? htmlspecialchars($_POST['datum']) : null;
    $tijd = isset($_POST['tijd']) ? htmlspecialchars($_POST['tijd']) : null;


    if ($klantId !== null && $tafelId !== null && $datum !== null && $tijd !== null) {
        $reservering = new Reservering();
        $data = [
            'klant_id' => $klantId,
            'tafel_id' => $tafelId,
            'datum' => $datum,
            'tijd' => $tijd
        ];

        $success = $reservering->addReservering($data);

        if ($success) {
            header('Location: reservering.php');
            exit;
        } else {
            echo "Failed to add reservation. Please try again later.";
        }
    } else {

        echo "Invalid form data. Please fill in all required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>
