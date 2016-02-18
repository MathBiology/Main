// Example illustrating how to return by reference.
function &array_find_value($needle, &$haystack) {
  foreach ($haystack as $key => $value) {
    if ($needle == $value) {
      return $haystack[$key];
    }
  }
}
$band =& array_find_value('The Doors', $artists);
