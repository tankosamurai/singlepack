<?php

namespace Singlepack;

class Endianness {

    static private $endianness;

    static function isBig(){
        if(!isset(self::$endianness)){
            self::$endianness = unpack("H*", pack("f", 1.0))[1] === "0000803f";
        }

        return self::$endianness;
    }

}

?>
