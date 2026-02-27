<?php

namespace App\Domain\Catalog\Exceptions;

use RuntimeException;

class CategoryNotFoundException extends RuntimeException
{
    public static function byId(int $id): self
    {
        return new self("category with in id {$id} not Found in catalog");
    }
}