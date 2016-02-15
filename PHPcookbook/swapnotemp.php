   <?php
// Swapping variables without using temporary variables example
$yesterday = 'pleasure';
$today = 'sorrow';
$tomorrow = 'celebrate';
list($yesterday,$today,$tomorrow) = array($today,$tomorrow,$yesterday);

echo $yesterday . " " . $today . " " . $tomorrow . "<br>";
?> 
