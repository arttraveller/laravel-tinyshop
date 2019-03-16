<?php

namespace App\Enums;

/**
 * Base class for enumerated data types
 */
abstract class BaseEnum
{

    protected static $enums = [];


    /**
     * Returns an array where the key is constant and value is it label.
     *
     * @return array constValue => label
     */
    abstract public static function getLabels(): array;


    /**
     * Returns class name.
     *
     * @return string|boolean
     */
    public static function getClass()
    {
        return get_called_class();
    }


    /**
     * Returns an array where the key is constant and value is it label.
     *
     * @return array $constName => $constValue
     */
    public static function getEnums(): array
    {
        $className = self::getClass();
        if ( !isset(self::$enums[$className])) {
            $class = new \ReflectionClass($className);
            $constants = $class->getConstants();
            self::$enums[$className] = $constants;
        }

        return self::$enums[$className];
    }


    /**
     * Returns constant label.
     *
     * @return string label
     */
    public static function getLabel($constValue): string
    {
        $result = null;
        $labels = static::getLabels();
        if (isset($labels[$constValue])) {
            $result = $labels[$constValue];
        }

        return $result;
    }

}
