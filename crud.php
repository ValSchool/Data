<?php
class DB {
    private $dbh;
    protected $stmt;

    public function __construct($db, $host = "localhost", $user = "root", $pass = "")
    {
        try {
            $this->dbh = new PDO("mysql: host=$host; dbname=$db;", $user, $pass);
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection error: " . $e->getMessage());
        }
    }

    public function crud($sql, $params = []) {
        $this->stmt = $this->dbh->prepare($sql);
        $this->stmt->execute($params);
    }
}

$myDb = new DB('database2');
