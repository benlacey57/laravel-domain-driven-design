<?php

namespace App\Helpers;

/**
 * A helper class that defines view helper functions that can be used for
 * getting and displaying SVG icons needed for the user interface.
 */
class Icon
{
    protected static $icon;
    protected static $size = 24;
    protected static $strokeColour = '#7999ac';
    protected static $strokeWidth = 2;

    /**
     * Returns a SVG string for the given icon.
     *
     * The inline SVG icon HTML string is retrieved from its own blade script
     * (if it exists). To add new icons ensure that you create the necessary
     * blade script to accompany it.
     *
     * @param string $icon
     * @param int $size
     * @param string $strokeColour
     * @param int $strokeWidth
     * @return string
     */
    public static function get($icon, $size = null, $strokeColour = null, $strokeWidth = null)
    {
        self::$icon = $icon;

        self::setSize($size);
        self::setStrokeColour($strokeColour);
        self::setStrokeWidth($strokeWidth);

        return self::iconSvg();
    }

    protected static function setSize($size)
    {
        self::$size = ($size) ?: self::$size;
    }

    protected static function setStrokeColour($strokeColour)
    {
        self::$strokeColour = ($strokeColour) ?: self::$strokeColour;
    }

    protected static function setStrokeWidth($strokeWidth)
    {
        self::$strokeWidth = ($strokeWidth) ?: self::$strokeWidth;
    }

    protected static function iconSvg()
    {
        if (view()->exists('package.credit-reports::icons.svg.' . self::$icon)) {
            return view(
                'package.credit-reports::icons.svg.' . self::$icon,
                [
                    'size' => self::$size,
                    'colour' => self::$strokeColour,
                    'width' => self::$strokeWidth,
                ]
            );
        }

        return '';
    }
}
