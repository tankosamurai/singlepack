<?php

namespace Singlepack;

function pack($format, $object){
    if(is_array($object)){
        return Packer::packArray($format, $object);
    }else if(is_numeric($object)){
        return Packer::packNumeric($format, $object);
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
    }else{
        return \unpack($format, $object)[1];
    }
}

?>
