<?php

namespace Singlepack;

function pack($format, $object){
    if(is_array($object)){
        return Packer::packArray($format, $object);
    }else if(is_numeric($object)){
        return Packer::packNumeric($format, $object);
    }else if($format === "S"){
        return Packer::packString($object);
    }else if($format === "X"){
        return Packer::packText($object);
    }else{
        return \pack($format, $object);
    }
}

function unpack($format, $object){
    if("T" === $format){
        return Unpacker::unpackTriad($object);
    }else if("t" === $format){
        return Unpacker::unpackTriadLittleEndian($object);
    }else if("F" === $format){
        return Unpacker::unpackFloat($object);
    }else if("D" === $format or "d" === $format){
        return Unpacker::unpackDouble($object);
    }else if("S" === $format){
        return Unpacker::unpackString($object);
    }else if("X" === $format){
        return Unpacker::unpackText($object);
    }else{
        return \unpack($format, $object)[1];
    }
}

?>
