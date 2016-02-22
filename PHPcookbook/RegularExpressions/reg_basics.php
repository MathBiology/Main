<?php $header = "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <title>Document</title>
</head>
<body>"?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php 
// Periods match any character, so .at matches bat, cat, rat etc.

// * means "match 0 or more of the preceding object"

// + means "Match ONE or more of the preceding object".. so .+at matches sprat, not at.

// ? means "preceding is optional", so it matches 0 or 1 of the object that precedes it
// -> so colou?r matches color and colour

// [aeiou] matches any of the characters; [a-z] lowercase. 
// [a-zA-Z0-9] matches digits and letters. [a-zA-Z0-9_] also matches underscore.

// anchoring: caret ^ anchors at beginning, $ at end of string. 
// ^[a-z0-9] means begins with one or more of a digit or lowercase letter,
// [a-z0-9]+$ means ends with...

$html = "<title>Document</title>";
if (preg_match('{<title>.+</title>}', $html)) {
    print "The page has a title!<br>";
}
$matches = [];
if (preg_match_all('/<li>/', $html, $matches)) {
    print 'Page has ' . count($matches[0]) . " list items<br>";
}
// turn bold into italic

//$italics = preg_replace('/(<\/?)b(>)/', '$1i$2', $bold);
//print $italics . "<br>";

$thisFileContents = file_get_contents(__FILE__);
// http://php.net/language.variables gives a regular expression for
// valid variable names in php. Beginning the pattern with \$ matches
// a literal $
$matchCount = preg_match_all('/\$[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/',
$thisFileContents, $matches);
print "Matches: $matchCount<br>";
foreach ($matches[0] as $variableName) {
    print "$variableName<br>";
}
unset($matches);

// Matching using |
$text = "The files are cuddly.gif, report.pdf, and cute.jpg.";
if (preg_match_all('/[a-zA-Z0-9]+\.(gif|jpe?g)/',$text,$matches)) {
print "The image files are: " . implode(',',$matches[0]);
}
    
?>    
</body>
</html>


