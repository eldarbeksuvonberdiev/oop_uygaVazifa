<?php

class Product{

    protected $table="products";

    public $con;

    public function __construct($db){
        $this->con = $db;
    }

    public function getAll(){
        
        $sql = "SELECT * FROM $this->table";
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

}
