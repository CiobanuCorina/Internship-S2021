<?php


namespace Module\ProductModule\Domain\Exception;


class SearchCriteriaInvalidPageException extends \DomainException
{
    public function __construct()
    {
        $this->message = "This page number doesn't exist.";
    }
}