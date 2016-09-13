<?php

namespace directapi\components;


use directapi\exceptions\EnumException;
use JsonSerializable;
use ReflectionClass;

abstract class Enum implements JsonSerializable
{
    private $current_val;

    public static $prefix;
    /**
     * @var array $cache
     */
    protected static $cache = [];

    /**
     * Enum constructor.
     * @param $type
     * @throws EnumException
     */
    public function __construct($type)
    {
        $class_name = get_class($this);

        if (static::$prefix) {
            $type = static::$prefix . '_' . $type;
        }

        $type = strtoupper($type);
        if (constant("{$class_name}::{$type}") === null) {
            throw new EnumException('Свойства ' . $type . ' в перечислении ' . $class_name . ' не найдено.');
        }

        $this->current_val = constant("{$class_name}::{$type}");
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->current_val;
    }

    /**
     * @return array
     */
    public static function getValues()
    {
        $class_name = static::class;

        if ( !isset(self::$cache[$class_name]) ) {
            $class = new ReflectionClass($class_name);
            self::$cache[$class_name] = array_values($class->getConstants());
        }

        return self::$cache[$class_name];
    }

    /**
     * @param array $arr
     * @return bool
     */
    public static function check(array $arr)
    {
        $values = static::getValues();
        foreach ($arr as $value) {
            if (!in_array($value, $values)) {
                return false;
            }
        }
        return true;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->current_val;
    }
}