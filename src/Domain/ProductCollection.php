<?php

namespace Module\ProductModule\Domain;

use ArrayObject;
use Module\ProductModule\Domain\Exception\SearchCriteriaInvalidPageException;

class ProductCollection extends ArrayObject
{

    public function __construct(Product ...$products)
    {
        parent::__construct($products);
    }

    public function hasCode(string $productCode): bool
    {
        foreach ($this as $product) {
            if ($productCode === $product->getCode()) {
                return true;
            }
        }
        return false;
    }


    public function filterIf(bool $flag, callable $callback)
    {
        if ($flag) {
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
        define("MAX_PAGE_NR", ceil(count($this) / $limit));
        if ($page > MAX_PAGE_NR) {
            throw new SearchCriteriaInvalidPageException();
        }
        return new self(...array_slice($this->getArrayCopy(), ($page - 1) * $limit, $limit));
    }

}
