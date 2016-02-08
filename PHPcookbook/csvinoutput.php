<?php
$sales = array( array('Northeast','2005-01-01','2005-02-01',12.54),
array('Northwest','2005-01-01','2005-02-01',546.33),
array('Southeast','2005-01-01','2005-02-01',93.26),
array('Southwest','2005-01-01','2005-02-01',945.21),
array('All Regions','--','--',1597.34) );

$filename = './sales.csv';
$fh = fopen($filename,'w') or die("Can't open $filename");
foreach ($sales as $sales_line) {
if (fputcsv($fh, $sales_line) === false) {
die("Can't write CSV line");
}
}
fclose($fh) or die("Can't close $filename");
?>

/* Read the data back and print it
$fp = fopen('./sales.csv','r') or die("can't open file");
print "<table>\n";
while($csv_line = fgetcsv($fp)) {
print '<tr>';
for ($i = 0, $j = count($csv_line); $i < $j; $i++) {
print '<td>'.htmlentities($csv_line[$i]).'</td>';
}
print "</tr>\n";
}
print "</table>\n";
fclose($fp) or die("can't close file");
*/
