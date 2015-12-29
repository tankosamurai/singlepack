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
            return \unpack("f", $string)[1];
        }else{
            return \unpack("f", strrev($string))[1];
        }
    }

    static function unpackDouble($string){
        if(Endianness::isBig()){
            return \unpack("d", $string)[1];
        }else{
            return \unpack("d", strrev($string))[1];
        }
    }

    static function unpackString($string){
        $len = \unpack("C", $string)[1];
        return substr($string, 1, $len);
    }

    static function unpackText($string){
        $len = \unpack("n", $string)[1];
        return substr($string, 2, $len);
    }

}

?>
