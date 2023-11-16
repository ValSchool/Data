<?php

class Database
{
    private $host = "localhost:3307";
    private $gebruikersnaam = "root";
    private $password = "";
    private $db = "db1";

    public $connection;
    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->gebruikersnaam, $this->password, $this->db);

        if ($this->connection->connect_error) {
            die("Fout bij het verbinden met de database: " . $this->connection->connect_error);
        }

        echo "Database verbinding tot stand gebracht";
    }
}

?>
