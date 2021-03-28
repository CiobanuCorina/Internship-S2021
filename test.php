<?php

require_once "C:\Users\cociobanu\Documents\Internship\\vendor\autoload.php";
use Module\ProductModule\Domain\Product;
use Module\ProductModule\Domain\ProductSearchCriteria;
use Module\ProductModule\Infrastructure\ProductRepository;

$p1 = new Product("name5", "code2", 25.6, "category5");
$p2 = new ProductRepository("C:\Users\cociobanu\Documents\Internship\src\source.txt");
//$p2->loadFile();
//var_dump($p2->getProductByCode("code10"));
//$p2->createProduct($p1);
//$p2->deleteProductByCode("code10");
//$p2->updateProduct($p1);
//$criteria1 = new ProductSearchCriteria();
//var_dump($p2->searchProduct($criteria1));

