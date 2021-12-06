<?php

namespace App;

class TagParser {
    public static function parse(string $string) : array
    {
        return preg_split('/ ?[,|] ?/', $string);
    }
}