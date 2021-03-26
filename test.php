<?php

require_once "C:\Users\cociobanu\Documents\Internship\\vendor\autoload.php";
use Module\ProductModule\Domain\Product;
use Module\ProductModule\Infrastructure\ProductRepository;

$p1 = new Product("name5", "code5", 25.6, "category5");
$p2 = new ProductRepository();
//$p2->loadFile("C:\Users\cociobanu\Documents\Internship\src\source.txt");
//var_dump($p2->getProductByCode("code2"));
$p2->createProduct($p1);
