<?php

namespace App\Helpers;

class ArrayKeyValueHelper
{
    /**
     * Filter out null mappings but preserve id when null as this is perfectly valid for new creations.
     * We also only filter on null as the bus will return an empty string for fields actually removed
     * @param array $mappings
     * @param array $keepKeyEvenIfNull
     * @return array
     */
    public static function filterOutNullMappings(array $mappings, array $keepKeyEvenIfNull = []): array
    {
        return collect($mappings)->filter(function ($mapping, $key) use ($keepKeyEvenIfNull) {
            return ( in_array($key, $keepKeyEvenIfNull) || $mapping !== null);
        })->toArray();
    }
}
