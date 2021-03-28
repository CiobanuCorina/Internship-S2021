<?php


namespace Module\ProductModule\Infrastructure;


use Module\ProductModule\Domain\Product;
use Module\ProductModule\Domain\ProductCollection;
use Module\ProductModule\Domain\ProductSearchCriteria;

interface ProductCatalogRepositoryInterface
{
    # CRUD
    public function getProductByCode(string $productCode): Product;

    public function searchProduct(ProductSearchCriteria $criteria): ProductCollection;

    public function createProduct(Product $product): bool;

    public function updateProduct(Product $product): bool;

    public function deleteProductByCode(string $productCode): bool;
}