// Function for converting a string to a comma-delineated array, 
// with example below.

function array_to_comma_string($array) {
    switch (count($array)) {
    case 0:
    return '';
    case 1:
    return reset($array);
    case 2:
    return join(' and ', $array);
    default:
    $last = array_pop($array);
    return join(', ', $array) . ", and $last";
    }
}  

$thundercats = array('Lion-O', 'Panthro', 'Tygra', 'Cheetara', 'Snarf');

print array_to_comma_string($thundercats);
