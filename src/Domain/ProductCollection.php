<?php
namespace Module\ProductModule\Domain;

use ArrayObject;
//use Module\ProductModule\Domain\Exception\ProductNotFoundException;

class ProductCollection extends ArrayObject {

    public function __construct(Product ... $products)
    {
        parent::__construct($products);
    }

    public function hasCode(string $productCode): bool{
        foreach($this as $product){
            if($productCode === $product->code()){
                return true;
            }
        }
        return false;
    }

    public function replace(Product $replacementProduct){
        foreach($this as $index => $product){
            if($product->code() === $product->code()) {
                $this[$index] = $replacementProduct;
                return;
            }
        }
        //throw new ProductNotFoundException();
    }

    public function remove(Product $replacementProduct){
        foreach($this as $index => $product){
            if($product->code() === $product->code()) {
                unset($this[$index]);
                return;
            }
        }
        //throw new ProductNotFoundException();
    }

    public function filterIf(bool $flag, callable $callback){
        if ($flag){
            return $this->filter($callback);
        }
        return $this;
    }
    public function filter(callable $callback)
    {
        return new self(...array_filter($this->getArrayCopy(), $callback));
    }
    
    public function slice(int $limit, int $page)
    {
        # fixme search issue from here
        return new self(...array_slice($this->getArrayCopy(), ($page - 1) * $limit, $limit));
    }

}
