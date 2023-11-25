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
    public function insertData($column1, $column2, $column3)
    {
        $sql = "INSERT INTO databasetable (column1, column2, column3) VALUES (?, ?, ?)";

        $stmt = $this->connection->prepare($sql);
        $stmt->bind_param("sss", $column1, $column2, $column3);
        if ($stmt->execute()) {
            echo "Data successvol opgehaald.";
        } else {
            echo "Fout met data te importeren." . $stmt->error;
        }
        $stmt->close();
    }
    public function selectData($id = null)
    {
        if ($id !== null) {
            $sql = "SELECT * FROM databasetable WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->bind_param("i", $id);
        } else {
            $sql = "SELECT * FROM databasetable";
            $stmt = $this->connection->prepare($sql);
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
        return $data;
    }
}
?>
