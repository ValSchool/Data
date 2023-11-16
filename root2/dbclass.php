<?php

class Database
{
    private $host = "localhost:3307";
    private $username = "root";
    private $password = "";
    private $db = "dbclass";

    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);

        if ($this->connection->connect_error) {
            die("Fout bij het verbinden met de database: " . $this->connection->connect_error);
        }

        echo "Database verbinding tot stand gebracht";
    }

    public function insertData($column1, $column2, $column3)
    {
        $sql = "INSERT INTO databasetable (column1, column2, column3) VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($sql);

        $stmt->bind_param("sss", $column1, $column2, $column3);

        if ($stmt->execute()) {
            echo "Data successvol opgehaald.";
        } else {
            echo "Fout met data te importeren. " . $stmt->error;
        }

        $stmt->close();
    }
}

?>
