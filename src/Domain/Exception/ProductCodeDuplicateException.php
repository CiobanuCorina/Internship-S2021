<?php


namespace Module\ProductModule\Domain\Exception;


class ProductCodeDuplicateException extends \DomainException
{

    public function __construct()
    {
        $this->message = "This product code already exists.";
    }
}