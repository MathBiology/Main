//Add a $delta value to compare two floating point numbers; erros may occur
// towards the trailing end of the float!
$delta = 0.00001;
$a = 1.00000001;
$b = 1.00000000;
if (abs($a - $b) < $delta) {
print '$a and $b are equal enough.';
}
