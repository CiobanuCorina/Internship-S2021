<?php
namespace Module\ProductModule;
use Module\ProductModule\ProductRepository as Repo;

require_once ('Domain/Product.php');
require_once ('Infrastructure/ProductRepository.php');

$p1 = new Product("name", "code", 12.6, "category");
$p2 = new Repo("source.txt");
$p2->getProductByCode("code");

