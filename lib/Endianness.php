<?php

namespace Rakeem;

class Endianness {

    static private $endianness;

    static function isBig(){
        if(!isset(self::$endianness)){
            $pack = pack("f", 1.0);
            self::$endianness = unpack("C*", $pack)[1] === 0;
        }

        return self::$endianness;
    }

}

?>
