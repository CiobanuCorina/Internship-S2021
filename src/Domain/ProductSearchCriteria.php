<?php


namespace Module\ProductModule\Domain;

use Module\ProductModule\Domain\Exception\SearchCriteriaInavlidLimitException;
use Module\ProductModule\Domain\Exception\SearchCriteriaInvalidPageException;

define("MAX_LIMIT", 20);

class ProductSearchCriteria
{
    private string $name;
    private string $code;
    private int $limit;
    private int $page;

    public function __construct(string $name = "", string $code = "", int $limit = 10, int $page = 1)
    {
        if ($limit <= 0 || $limit > MAX_LIMIT) {
            throw new SearchCriteriaInavlidLimitException();
        }
        if($page <= 0){
            throw new SearchCriteriaInvalidPageException();
        }
        $this->name = $name;
        $this->code = $code;
        $this->limit = $limit;
        $this->page = $page;
    }

    public function getName(): string
    {
        return $this->name;
    }


    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): void
    {
        $this->code = $code;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    public function setPage(int $page): void
    {
        $this->page = $page;
    }

}