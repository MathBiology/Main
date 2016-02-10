<?php 

// hexadecimal number (base 16)
$hex = 'a1';
// convert from base 16 to base 10
// $decimal is '161'
$decimal = base_convert($hex, 16, 10);
echo $decimal . "<br>";

// BUILTINS
// convert from base 2 to base 10
// $a = 27
$a = bindec(11011);
echo $a . "<br>";
// convert from base 8 to base 10
// $b = 27
$b = octdec(33);
echo $b . "<br>";
// convert from base 16 to base 10
// $c = 27
$c = hexdec('1b');
echo $c . "<br>";
// convert from base 10 to base 2
// $d = '11011'
$d = decbin(27);
echo $d . "<br>";
// $e = '33'
$e = decoct(27);
echo $e . "<br>";
// $f = '1b'
$f = dechex(27);
echo $f . "<br>";

// Alternatives using printf
$red = 0;
$green = 102;
$blue = 204;
// $color is '#0066CC'
$color = printf('#%02X%02X%02X', $red, $green, $blue);

?>
