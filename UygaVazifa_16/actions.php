<?php

class Actions
{

    protected $table = "talabalar";

    public $id;

    public $fname;

    public $tel;

    public $manzil;

    public $rasm;

    public $con;

    public function __construct($db)
    {
        $this->con = $db;
    }

    public function getAll()
    {

        $sql = "SELECT * FROM $this->table ORDER BY id DESC";
        $stmt = $this->con->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getOne()
    {

        $sql = "SELECT * FROM $this->table WHERE id = :id";
        $stmt = $this->con->prepare($sql);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function create()
    {

        $sql = "INSERT INTO $this->table (fio,tel,manzil,img) VALUES (:fname, :tel, :manzil, :rasm)";
        $stmt = $this->con->prepare($sql);

        $this->fname = htmlspecialchars(strip_tags($this->fname));
        $this->tel = htmlspecialchars(strip_tags($this->tel));
        $this->manzil = htmlspecialchars(strip_tags($this->manzil));
        $this->rasm = htmlspecialchars(strip_tags($this->rasm));

        $stmt->bindParam(':fname', $this->fname);
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':manzil', $this->manzil);
        $stmt->bindParam(':rasm', $this->rasm);

        if ($stmt->execute()) {
            return true;
        }

        return false;
    }

    public function delete()
    {

        $sql = "DELETE FROM $this->table WHERE id = :id";

        $stmt = $this->con->prepare($sql);

        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function edit()
    {
        if(!isset($this->rasm)){
            $sql = "UPDATE $this->table SET fio = :fname, tel = :tel, manzil = :manzil, img = :rasm WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->tel = htmlspecialchars(strip_tags($this->tel));
            $this->manzil = htmlspecialchars(strip_tags($this->manzil));
            $this->id = htmlspecialchars(strip_tags($this->id));
            
        }else{
            $sql = "UPDATE $this->table SET fio = :fname, tel = :tel, manzil = :manzil, img = :rasm WHERE id = :id";
            $stmt = $this->con->prepare($sql);
            
            $this->fname = htmlspecialchars(strip_tags($this->fname));
            $this->tel = htmlspecialchars(strip_tags($this->tel));
            $this->manzil = htmlspecialchars(strip_tags($this->manzil));
            $this->rasm = htmlspecialchars(strip_tags($this->rasm));    
            $this->id = htmlspecialchars(strip_tags($this->id));
            $stmt->bindParam(':rasm', $this->rasm);
            
        }        
        $stmt->bindParam(':fname', $this->fname);
        $stmt->bindParam(':tel', $this->tel);
        $stmt->bindParam(':manzil', $this->manzil);
        
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
