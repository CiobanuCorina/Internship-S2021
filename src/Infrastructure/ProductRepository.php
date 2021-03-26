<?php

namespace Module\ProductModule\Infrastructure;

use Module\ProductModule\Application\ProductCatalogServiceInterface;
use Module\ProductModule\Domain\Product;

use ArrayObject;


class ProductRepository extends ArrayObject implements ProductCatalogServiceInterface{

    private $fileInfo;

    public function loadFile(string $path){
        $strItems = file($path);
        $this->fileInfo = [];
        foreach($strItems as $item){
            $item = json_decode($item, true);
            array_push($this->fileInfo, $item);
        }
    }

    public function getProductByCode(string $productCode):Product{
        $this->loadFile("C:\Users\cociobanu\Documents\Internship\src\source.txt");
        foreach($this->fileInfo as $product){
            foreach($product as $productItems){
                if($productItems["code"] === $productCode){
                    return new Product($productItems["name"], $productItems["code"], $productItems["price"], $productItems["category"]);
                }    
            }
        }
    }
    // public function searchProduct(ProductSearchCriteria $criteria): ProductCollection{
    //     print "search product";
    // }
    public function createProduct(Product $product): bool{
        $arr = array("Product" => array("name" => $product->getName(), "code" => $product->getCode(),
                                          "price" => $product->getPrice(), "category" => $product->getCategory()));
        if(file_put_contents("C:\Users\cociobanu\Documents\Internship\src\source.txt", "\n".json_encode($arr), FILE_APPEND) === FALSE){
            return FALSE;
        };
        return TRUE;
    }
    // public function updateProduct(Product $product): bool{
    //     print "update product";
    // }
    // public function deleteProductByCode(string $productCode): bool{
    //     print "delete product";
    // }

}