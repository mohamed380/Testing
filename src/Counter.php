<?php

namespace App;

class Counter {

    public static function validate($string)
    {
      return  preg_match('/^\[({"age":\d+,"key":"[mf]"},?)+]$/', $string);
    }

    public static function age(string $string) : int
    {
        return preg_match_all('/\{"age":([5-9][0-9]|([1-9]\d{2,})),/', $string);
    }
    
    public static function males(string $string) : int
    {
        return preg_match_all('/"key":"m"/', $string);
    }

    public static function females(string $string) : int
    {
        return preg_match_all('/"key":"f"/', $string);
    }

}