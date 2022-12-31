<?php

namespace App\Traits;

use Illuminate\Support\Str;

/**
 * A trait class that can be added to DTOs to easily take all properties of the class and output to an array
 * Class DtoToArrayTrait
 *
 * App\Traits\DtoToArrayTrait
 */
trait DtoToArrayTrait
{
    /**
     * Gets the properties of the given object and turns it into an array
     *
     * @param  bool  $format
     * @param  int  $formatType
     * @return array
     */
    public function toArray(bool $format = false, int $formatType = ArrayFormatEnum::SNAKE_CASE): array
    {
        $arr = get_object_vars($this);

        if($format){
            $arr = $this->formatArray($arr, $formatType);
        }

        return $arr;
    }

    /**
     * Gets all properties that are not null or empty strings and returns as an array
     *
     * @param  bool  $format
     * @param  int  $formatType
     * @return array
     */
    public function toCleanArray(bool $format = false, int $formatType = ArrayFormatEnum::SNAKE_CASE): array
    {
        $arr = $this->toArray($format, $formatType);

        return array_filter($arr, function ($value){
            return !is_null($value) && $value !== '';
        });
    }

    /**
     * Format a given array to change the key to either camelCase or snake_case
     * Default is snake_case as this will be used more when sending information through the API
     *
     * @param  array  $arr
     * @param  int  $type
     * @return array
     */
    private function formatArray(array $arr, int $type = ArrayFormatEnum::SNAKE_CASE): array
    {
        $formattedArr = [];

        foreach($arr as $key => $value){
            $formattedKey = ($type == ArrayFormatEnum::SNAKE_CASE) ? Str::snake($key) : Str::camel($key);
            $formattedArr[$formattedKey] = $value;
        }

        return $formattedArr;
    }
}
