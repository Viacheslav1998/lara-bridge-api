<?php

namespace App\Domain\User\Services;

class HumanNameService
{
    public function isFirstLetterUppercase(string $name): bool
    {
        if(empty($name))
        {
            return false;
        }

        $firstChar = mb_substr($name, 0, 1, 'UTF-8');

        return $firstChar === mb_strtoupper($firstChar, 'UTF-8')
            && $firstChar !== mb_strtolower($firstChar, 'UTF-8');
    }
}