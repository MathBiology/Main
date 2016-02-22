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
<pre>
<?php 
// Pull all words from a string    
$text = "Knock, knock. Who's there? r2d2!";
$words = preg_match_all('/\w+/', $text, $matches);
//var_dump($matches[0]);

// Deals with the apostrophe; ?:  prevents the parenthesized from being captured
$text = "Knock, knock. Who's there? r2d2!";
$pattern = "/(?:\w'\w|\w)+/";
$words = preg_match_all($pattern, $text, $matches);
//var_dump($matches[0]);

// Unicode awareness with u-modifier
$fr = 'Toc, toc. Qui est là? R2D2!';
$fr_words = preg_match_all('/\w+/u', $fr, $matches);
print "The French words are:<br>\t";
print implode(', ', $matches[0]) . "<br>";

$kr = '노크, 노크. 거기 누구입니까? R2D2!';
$kr_words = preg_match_all('/\w+/u', $kr, $matches);
print "The Korean words are:<br>\t";
print implode(', ', $matches[0]) . "<br>";

?> 
</pre>   
</body>
</html>


