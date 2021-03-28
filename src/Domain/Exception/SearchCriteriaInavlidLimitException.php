<?php


namespace Module\ProductModule\Domain\Exception;


class SearchCriteriaInavlidLimitException extends \DomainException
{
    public function __construct()
    {
        $this->message = "Can't view more than 20 items on a page.";
    }
}