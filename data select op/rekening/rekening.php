<?php
include '../db.php';
include 'rekening.php';

class Rekening {
    private $db;

    public function __construct(DB $db) {
        $this->db = $db;
    }
}
