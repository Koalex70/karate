<?php

namespace App\Helpers;

class CategoryNetGenerator
{
    public static function getNetSize($participantsCount)
    {
        return pow(2, CategoryNetGenerator::minPowerOfTwo($participantsCount));
    }

    public static function minPowerOfTwo($number): int
    {
        if ($number < 1) {
            return 0;
        }

        $power = 0;
        while (pow(2, $power) < $number) {
            $power++;
        }

        return $power;
    }
}
