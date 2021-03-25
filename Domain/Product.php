<?php

namespace Module\ProductModule;

class Product{
    private string $name;
    private string $code;
    private float $price;
    private string $category;

    function __construct(string $name, string $code, float $price, string $category){
        $this->name = $name;
        $this->code = $code;
        $this->price = $price;
        $this->category = $category;
    }

    public function getName():string{
        return $this->name;
    }

    public function getCode():string{
        return $this->code;
    }

    public function getPrice():float{
        return $this->price;
    }

    public function getCategory():string{
        return $this->category;
    }

    public function setName(string $newName):self{
        $this->name = $newName;
        return $this;
    }

    public function setCode(string $newCode):self{
        $this->name = $newCode;
        return $this;
    }

    public function setPrice(string $newPrice):self{
        $this->name = $newPrice;
        return $this;
    }
    
    public function setCategory(string $newCategory):self{
        $this->name = $newCategory;
        return $this;
    }
}