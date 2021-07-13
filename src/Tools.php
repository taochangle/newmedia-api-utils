<?php


namespace taoxin\utils;

/**
 * 工具类
 * Class Tools
 * @package taoxin\utils
 */
class Tools
{
    /**
     * 对象转数组
     * @param $object
     * @return mixed
     */
    public static function object2array($object)
    {
        $jsonString = is_object($object) ? json_encode($object) : $object;
        return json_decode($jsonString, true);
    }
}