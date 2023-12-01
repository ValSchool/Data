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
        try {
            $this->connection = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->gebruikersnaam, $this->password);
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database verbinding tot stand gebracht";
        } catch (PDOException $e) {
            die("Fout bij het verbinden met de database: " . $e->getMessage());
        }
    }

    public function updateData($id, $column1, $column2, $column3)
    {
        try {
            $sql = "UPDATE databasetable SET column1 = ?, column2 = ?, column3 = ? WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$column1, $column2, $column3, $id]);

            echo "Data successvol geüpdatet.";
        } catch (PDOException $e) {
            die("Fout bij het updaten van de data: " . $e->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM databasetable WHERE id = ?";
            $stmt = $this->connection->prepare($sql);
            $stmt->execute([$id]);

            echo "Data successvol verwijderd.";
        } catch (PDOException $e) {
            die("Fout bij het verwijderen van de data: " . $e->getMessage());
        }
    }
}
?>
