<?php


namespace Module\ProductModule\Domain\Exception;


class ProductNotFoundException extends \DomainException
{

    public function __construct()
    {
        $this->message = "This product doesn't exist.";
    }
}