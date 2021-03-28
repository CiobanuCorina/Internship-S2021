<?php

namespace Module\ProductModule\Infrastructure;


use Module\ProductModule\Domain\Exception\ProductCodeDuplicateException;
use Module\ProductModule\Domain\Exception\ProductNotFoundException;
use Module\ProductModule\Domain\Product;
use Module\ProductModule\Domain\ProductCollection;
use Module\ProductModule\Domain\ProductSearchCriteria;


class ProductRepository implements ProductCatalogRepositoryInterface
{

    private ProductCollection $fileInfo;
    private string $path;

    public function __construct(string $path)
    {
        $this->path = $path;
    }


    public function loadFile()
    {
        $arr = [];
        $strfile = file($this->path);
        foreach ($strfile as $product) {
            $arr[] = Product::fromArray(json_decode($product, true));
        }
        $this->fileInfo = new ProductCollection(...$arr);

    }

    public function getProductByCode(string $productCode): Product
    {
        $this->loadFile();
        if (!($this->fileInfo->hasCode($productCode))) {
            throw new ProductNotFoundException();
        }
        foreach ($this->fileInfo->getArrayCopy() as $product) {
            if ($product->getCode() === $productCode) {
                return $product;
            }
        }
    }

    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection
    {
        $this->loadFile();
        return $this->fileInfo->filterIf(!empty($criteria->getName()), function (Product $product) use ($criteria) {
            return str_starts_with($product->getName(), $criteria->getName());
        })
            ->filterIf(!empty($criteria->getCode()), function (Product $product) use ($criteria) {
                return str_starts_with($product->getCode(), $criteria->getCode());
            })
            ->slice($criteria->getLimit(), $criteria->getPage());
    }

    public function createProduct(Product $product): bool
    {
        $this->loadFile();
        if ($this->fileInfo->hasCode($product->getCode())) {
            throw new ProductCodeDuplicateException();
        }
        $arr = array("name" => $product->getName(), "code" => $product->getCode(),
            "price" => $product->getPrice(), "category" => $product->getCategory());
        return file_put_contents($this->path, "\n" . json_encode($arr), FILE_APPEND);
    }

    public function updateProduct(Product $product): bool
    {
        $this->deleteProductByCode($product->getCode());
        return $this->createProduct($product);
    }

    public function deleteProductByCode(string $productCode): bool
    {
        $rows = file($this->path);
        $flag = FALSE;
        foreach ($rows as $key => $row) {
            $flag = strpos($row, $productCode);
            if ($flag) {
                unset($rows[$key]);
            }
        }
        if ($flag === FALSE) {
            throw new ProductNotFoundException();
        }
        file_put_contents($this->path, $rows);
        return file_put_contents($this->path, rtrim(file_get_contents($this->path), "\n"));
    }
}