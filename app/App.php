<?php

namespace App;

class App
{
    private static $db;

    public static function getDB()
    {
        if (self::$db === null) {
            self::$db = new Database('chifoumi');
        }
        return self::$db;
    }
}
