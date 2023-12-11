<?php

class Database
{
    private $host = "localhost:3307";
    private $gebruikersnaam = "root";
    private $wachtwoord = "";
    private $db = "db1";

    public $connectie;

    public function __construct()
    {
        try {
            $this->connectie = new PDO("mysql:host={$this->host};db1={$this->db}", $this->gebruikersnaam, $this->wachtwoord);
            $this->connectie->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Database verbinding tot stand gebracht";
        } catch (PDOException $e) {
            die("Fout bij het verbinden met de database: " . $e->getMessage());
        }
    }
    public function updateData($id, $kolom1, $kolom2, $kolom3)
    {
        try {
            $sql = "UPDATE db1 SET kolom1 = ?, kolom2 = ?, kolom3 = ? WHERE id = ?";
            $stmt = $this->connectie->prepare($sql);
            $stmt->execute([$kolom1, $kolom2, $kolom3, $id]);

            echo "Data successvol geupdate.";
        } catch (PDOException $e) {
            die("Fout bij het updaten van de data: " . $e->getMessage());
        }
    }

    public function deleteData($id)
    {
        try {
            $sql = "DELETE FROM db1 WHERE id = ?";
            $stmt = $this->connectie->prepare($sql);
            $stmt->execute([$id]);

            echo "Data succesvol verwijderd.";
        } catch (PDOException $e) {
            die("Fout bij het verwijderen van de data: " . $e->getMessage());
        }
    }
}
?>
