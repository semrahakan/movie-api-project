<?php


namespace App\Service;


class StringManipulationService
{
    public static function removeDashAndMakeIntValue(string $value): int
    {
        $trimmedValue = str_replace('-', '', $value);
        return (int) $trimmedValue;
    }

}