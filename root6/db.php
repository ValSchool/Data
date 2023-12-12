<?php
class Database {
    public $pdo;

    public function __construct($db = "users", $user = "root", $pass = "", $host = "localhost:3307"){

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connection established.";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }     

    public function insertUser($name, $password) {
        $stmt = $this->pdo->prepare("INSERT INTO user (name, password) VALUES (?, ?)");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$name, $password]);
    }

    public function slectUser() {
        $stmt = $this->pdo->query("SELECT * FROM user");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function slect($id = null) {
        if($id) {
             $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
             $stmt->execute([$id]);
             $result = $stmt->fetch();
             return $result;
        }
        $stmt = $this->pdo->query("SELECT * FROM user");
        $result = $stmt->fetchAll();
        return $result;
    }

    public function slectOneUser($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE id = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch();
        return $result;
    }

    public function editUser($name, $password, $id) {
        $stmt = $this->pdo->prepare("UPDATE user SET name = ?, password = ? WHERE id = ?");
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$name, $password, $id]);
    }

    public function loginUser($identifier, $password) {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE name = :identifier OR email = :identifier");
        $stmt->execute(['identifier' => $identifier]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }
}
?>
