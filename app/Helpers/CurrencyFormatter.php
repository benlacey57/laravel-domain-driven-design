<?php

namespace App\Helpers;

class CurrencyFormatter
{
    private const POUND_SYMBOL = '£';

    /**
     * Return a Formatted string for GBP(£)
     * @param float $value
     * @return string
     */
    public static function gbpCurrency(float $value): string
    {
        return self::POUND_SYMBOL . number_format($value, 2);
    }
}
