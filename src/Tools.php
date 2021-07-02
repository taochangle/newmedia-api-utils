<?php


namespace taoxin\utils;


class Tools
{
    function object2array($object)
    {
        return json_decode(json_encode($object), true);
    }
}