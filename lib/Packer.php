<?php

namespace Singlepack;

class Packer {

    static function packArray($format, $array){
        $temp = "";

        foreach($array as $value){
            $temp .= self::packNumeric($format, $array);
        }

        return $temp;
    }

    static function packNumeric($format, $numeric){
        if("T" === $format){
            return self::packTriad($numeric);
        }else if("F" === $format){
            return self::packFloat($numeric);
        }else if("D" === $format or "d" === $format){
            return self::packDouble($numeric);
        }else{
            return \pack($format, $numeric);
        }
    }

    static function packTriad($numeric){
        $upper = $numeric / 65536;
        $lower = $numeric % 65536;
        $temp  = "";
        $temp .= \pack("C", $upper);
        $temp .= \pack("n", $lower);

        return $temp;
    }

    static function packFloat($float){
        $string = \pack("f", $float);

        if(Endianness::isBig()){
            return $string;
        }else{
            return strrev($string);
        }
    }

    static function packDouble($double){
        $string = \pack("d", $double);

        if(Endianness::isBig()){
            return $string;
        }else{
            return strrev($string);
        }
    }

    static function packString($string){
        $len = \pack("C", strlen($string));
        return $len . $string;
    }

    static function packText($text){
        $len = \pack("n", strlen($text));
        return $len . $text;
    }

}

?>
