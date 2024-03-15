<?php
class DB {
    private $db;
    protected $stmt;
 
    public function __construct($db, $host = "localhost:3309", $user = "root", $pass ="")
    {
        try {
            $this->db = new PDO("mysql:host=$host; dbname=$db;", $user, $pass);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }
 

    public function execute($sql, $placeholders = null) {
        $stmt = $this->db->prepare($sql);
        $stmt->execute($placeholders);
        return $stmt;
    }
}

$mydb = new DB('dbdb');
