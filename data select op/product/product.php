<?php
include '../db.php';

class Product {
    private $dbh;
    private $table = "product";

    public function __construct(DB $dbh)
    {
        $this->dbh = $dbh;
    }

    public function insertProduct(String $name, String $description, int $price)
    {
        return $this->dbh->execute("INSERT INTO $this->table
        VALUES (null,?,?,?)", [$name, $description, $price]);
    }

    public function selectAllProducts(){
        return $this->dbh->execute("SELECT * FROM product");
    }

    public function selectOneProduct($id){
        return $this->dbh->execute("SELECT * FROM product WHERE product_id =?", [$id]);
    }
}
?>
