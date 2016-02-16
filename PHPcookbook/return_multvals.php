<?php
// Returning ALL of multiple values
function array_stats($values) {
  $min = min($values);
  $max = max($values);
  $mean = array_sum($values) / count($values);
  return array($min, $max, $mean);
}
$values = array(1,3,5,9,13,1442);
list($min, $max, $mean) = array_stats($values);
print $min . " " .  $max . " " . $mean . "<br>";

// Returning selected values
function time_parts($time) {
    return explode(':', $time);
}
list(, $minute,) = time_parts('12:34:56');
print $minute . "<br>";

/* Obtaining selected read-in info
while ($fields = fgetcsv($fh, 4096)) {
  print $fields[2] . "\n"; // the third field
}*/

?> 
