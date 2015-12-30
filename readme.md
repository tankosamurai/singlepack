# Singlepack

machine-independent pack and unpack functions.

by @tankosamurai

# Demo

```
<?php

require "vendor/autoload.php";

Singlepack\pack("f", 1.0); # returns LittleEndian-float packed value.
Singlepack\pack("F", 1.0); # returns BigEndian-float packed value.

?>
```

# Usage

| format | type | length | endianness |
|---|---|---|---|
| F | float | 4 Byte | Big |
| f | float | 4 Byte | Little |
| D | double | 8 Byte | Big |
| d | double | 8 Byte | Little |
| C  | char | 1 Byte  | - |
| n  | int | 2 Byte | Big  |
| v  | int | 2 Byte | Little  |
| T  | triad | 3 Byte | Big  |
| t  | triad | 3 Byte | Little  |
| N  | short | 4 Byte | Big |
| V  | short | 4 Byte  | Little |
| J  | long | 8 Byte | Big  |
| P  | long | 8 Byte | Little |
| S  | String | 1 Byte length | Big |
| X  | Text | 2 Byte length | Big |

# Installation for Composer

[Composer](https://getcomposer.org/ "Composer")

add following lines to your composer.json

```
"repositories": [
    {
        "type": "git",
        "url": "https://github.com/tankosamurai/singlepack.git"
    }
]

```

then upgrade your composer.lock

```
$ composer update
```

and add require vendor/autoload.php to your head of code.

```
require "vendor/autoload.php";
```
