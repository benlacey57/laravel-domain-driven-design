<?php

namespace App\Helpers;

/**
 * @SuppressWarnings(PHPMD)
 */
class JsonHelper
{
    /**
     * @TODO Jonathan Leahy to refactor this code as Cyclomatic issue suppressed for now
     * Indents a flat JSON string to make it more human-readable.
     *
     * @param string $json The original JSON string to process.
     * @SuppressWarnings(PHPMD)
     * @return string Indented version of the original JSON string.
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     */
    public static function indent($json)
    {

        $result = '';
        $pos = 0;
        $strLen = strlen($json);
        $indentStr = '  ';
        $newLine = "\n";
        $prevChar = '';
        $outOfQuotes = true;

        for ($i = 0; $i <= $strLen; $i++) {
            // Grab the next character in the string.
            $char = substr($json, $i, 1);

            // Are we inside a quoted string?
            if ($char == '"' && $prevChar != '\\') {
                $outOfQuotes = !$outOfQuotes;

                // If this character is the end of an element,
                // output a new line and indent the next line.
            } elseif (($char == '}' || $char == ']') && $outOfQuotes) {
                $result .= $newLine;
                $pos--;
                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }

            // Add the character to the result string.
            $result .= $char;

            // If the last character was the beginning of an element,
            // output a new line and indent the next line.
            if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
                $result .= $newLine;
                if ($char == '{' || $char == '[') {
                    $pos++;
                }

                for ($j = 0; $j < $pos; $j++) {
                    $result .= $indentStr;
                }
            }

            $prevChar = $char;
        }

        return $result;
    }

    /**
     * Pass in a search for key and a json structure and if the key is found
     * then return the value
     * @param $key
     * @param string $jsonIn
     * @return array|mixed
     */
    public static function searchKey($key, string $jsonIn)
    {
        $arr = json_decode($jsonIn, true);
        $val = [];

        if (is_array($arr)) {
            array_walk_recursive($arr, function ($v, $k) use ($key, &$val) {
                if ($k == $key) {
                    array_push($val, $v);
                }
            });
        }

        return count($val) > 1 ? $val : array_pop($val);
    }
}
