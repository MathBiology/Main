// Build a name/value pair query string for:
// /muppet/select.php?name=Oscar+the+Grouch&color=green&favorite_punctuation=%23
$vars = array('name' => 'Oscar the Grouch',
'color' => 'green',
'favorite_punctuation' => '#'); // # is hex coded as %23

$query_string = http_build_query($vars);
$url = '/muppet/select.php?' . $query_string;

echo $url . "<br>";

// Convert characters to HTML equivalents to not confuse embedded entities
$url = '/muppet/select.php?' . htmlentities($query_string);
echo $url . "<br>";

// Third option: change & to &amp using configuration directive.
ini_set('arg_separator.input', '&amp;');
$url = '/muppet/select.php?' . htmlentities($query_string);
echo $url . "<br>";

// Reading the POST Request Body, not parsed through $_POST
// Example: xml document that's been posted
//$body = file_get_contents('php://input');

?>
