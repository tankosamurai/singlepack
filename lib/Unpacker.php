<?php

namespace Singlepack;

class Unpacker {

    static function unpackTriad($string){
        $upper = \unpack("C", substr($string, 0, 1))[1];
        $lower = \unpack("n", substr($string, 1, 2))[1];

        return $upper * 65536 + $lower;
    }

    static function unpackTriadLittleEndian($string){
        return self::unpackTriad(strrev($string));
    }

    static function unpackFloat($string){
        if(Endianness::isBig()){
            return \unpack("f", strrev($string))[1];
        }else{
            return \unpack("f", $string)[1];
        }
    }

}

?>
