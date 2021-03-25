<?php

namespace Module\ProductModule;

require_once ('Domain/Product.php');
require_once ('Application/ProductCatalogServiceInterface.php');
use ArrayObject;

class ProductRepository extends ArrayObject implements ProductCatalogServiceInterface{

    private $fileInfo;

    public function __construct(string $path){
        $fp = fopen($path, "r");
        $this->fileInfo = json_decode(fread($fp, filesize($path)));
    }

    public function getProductByCode(string $productCode){
        print_r ($this->fileInfo);
    }
    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection{
        print "search product";
    }
    public function createProduct(Product $product): bool{
        print "search product";
    }
    public function updateProduct(Product $product): bool{
        print "update product";
    }
    public function deleteProductByCode(string $productCode): bool{
        print "delete product";
    }

}