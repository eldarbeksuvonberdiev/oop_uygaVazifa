<?php
// class Car
// {
//     public $color;
//     public $price;
//     public $year;

//     public function show()
//     {
//         echo "Color: ".$this->color . ", Price: " . $this->price . ", Year: " . $this->year;
//     }

//     public function test()
//     {
//         return $this->show();
//     }
// }

// $bmw = new Car();
// $bmw->color = "Red";
// $bmw->price = 20000;
// $bmw ->year = 2021;
// $bmw->test();
// echo "<br><hr>";
// $bmw->show();

// class Tavar
// {
//     public $soni;
//     protected $narx;
//     private $summa;

//     public function setPrice($price)
//     {
//         $this->narx = $price;
//     }

//     public function Summ(){
//         $this->summa ='Umumiy summasi: '. $this->soni * $this->narx.', Soni: '.$this->soni. ', Narxi: '.$this->narx;
//         return $this->summa;
//     }
// }

// $suv = new Tavar();
// $suv->soni = 10;
// $suv->setPrice(15000);
// echo $suv->Summ();


// class Product{
//     public $name;
//     protected $price;

//     public function setPrice($price){
//         $this->price = $price;
//     }
// }

// class Phone extends Product{
//     public $color;
//     private $memory;

//     public function setMemory(){
//         $this->memory = 64;
//     }

//     public function show(){
//         return 'Nomi: '.$this->name. ', Rangi: '.$this->color.', Narxi: '.$this->price.', Memory: '.$this->memory;
//     }
// }

// $phone = new Phone();
// $phone->name = "Samsung";
// $phone->setPrice(15000);
// $phone->color = "Black";
// $phone->setMemory();
// echo $phone->show();

include "DB.php";
include "Product.php";

$db = new DB();
 $product = new Product($db->boglanish());
 $products = $product->getAll();
 ?>

<table width="90%" border="2" align="center">
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Price</th>
        <th>Count</th>
    </tr>
    <?php
        foreach ($products as $product) { ?>
            <tr>
                <td><?=$product['id']; ?></td>
                <td><?=$product['name']; ?></td>
                <td><?=$product['price']; ?></td>
                <td><?=$product['count']; ?></td>
            </tr>
       <?php }
    ?>
</table>




