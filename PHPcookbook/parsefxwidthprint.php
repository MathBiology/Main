<?php

$booklist=<<<END
Elmer Gantry             Sinclair Lewis 1927
The Scarlatti InheritanceRobert Ludlum  1971
The Parsifal Mosaic      Robert Ludlum  1982
Sophies Choice           William Styron 1979
END;

function fixed_width_unpack($format_string,$data) {
$r = array();
for ($i = 0, $j = count($data); $i < $j; $i++) {
$r[$i] = unpack($format_string,$data[$i]);
}
return $r;
}

$books = explode("\n",$booklist);

$book_array = fixed_width_unpack('A25Title/A15Author/A4Publication_year',
$books);

// Print as Table:

print "<table>\n";
// print a header row
print '<tr><td>';
print join('</td><td>',array_keys($book_array[0]));
print "</td></tr>\n";
// print each data row
foreach ($book_array as $row) {
print '<tr><td>';
print join('</td><td>',array_values($row));
print "</td></tr>\n";
}
print "</table>\n";

?>









