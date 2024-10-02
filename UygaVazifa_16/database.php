<?php
class Database{
    public $host = "localhost";
    public $dbname = "oopda";
    public $user = "root";
    public $password = "root";
    public $con;


    public function __construct(){
        $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbname",$this->user,$this->password);
    }

    public function connect(){
        return $this->con;
    }
}
