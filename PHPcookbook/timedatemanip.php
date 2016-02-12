<?php 

//Find current time and date
print date('r') . "<br>";

// Or create the DateTime class
$when = new DateTime();
print $when->format('r') . "<br>";

//timeparts
$now_1 = getdate();
//getdate options other -> mday, wday, mon, year, yday, weekday, month, 0

$now_2 = localtime();
print "{$now_1['hours']}:{$now_1['minutes']}:{$now_1['seconds']}" . "<br>";
print "$now_2[2]:$now_2[1]:$now_2[0]" . "<br>";

// getdate obv returns associative array
$a = getdate();
printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);
echo "<br>";

// Using epicho timestamp 
$a = getdate(163727100);
printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);
echo "<br>";

// 7:45:03 PM on March 10, 1975, local time
// Assuming your "local time" is US Eastern time
$then = mktime(19,45,3,3,10,1975);
$a = getdate($then);
echo $then . "<br>";
printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);
echo "<br>";

// 7:45:03 PM on March 10, 1975, in GMT
// clearly hours, minutes, seconds, days, months, year
$then = gmmktime(19,45,3,3,10,1975);
echo $then . "<br>";
$a = getdate($then);
printf('%s %d, %d',$a['month'],$a['mday'],$a['year']);
echo "<br>";

// epioch for 3:25 pm on dec 3, 2024.
date_default_timezone_set('America/New_York');
// $stamp_future is 1733257500
$stamp_future = mktime(15,25,0,12,3,2024);
// $formatted is '2024-12-03T15:25:00-05:00'
$formatted = date('c', $stamp_future);
echo $formatted . "<br>";

date_default_timezone_set('America/New_York');
// $stamp_future is 1733239500, whch is 18000
// smaller than 1733257500
$stamp_future = gmmktime(15,25,0,12,3,2024);
echo $stamp_future . "<br>";

// Using DateTime class; options are '#' - separation bytes, '?' - 
// any byte, '*' - any number of bytes until next character, '!' - reset 
// all fields of "start of Unix epoch" values, '|' - reset unparsed fields
// to unix epoch, '+' treat unparsed trailing data as warning
$text = "Birthday: May 11, 1918.";
$when = DateTime::createFromFormat("*: F j, Y.|", $text);
// $formatted is "Saturday, 11-May-18 00:00:00 EDT"
$formatted = $when->format(DateTime::RFC850);
echo $formatted . "<br>";


// time is set relative to your timezone, which is set with 
// date_default_timezone_set() for getdate(), or the following alt:
// Note: @ lets DateTime know we have an epoch timestamp.
$when = new DateTime("@163727100");
$when->setTimezone(new DateTimeZone('America/Los_Angeles'));
$parts = explode('/', $when->format('Y/m/d/H/i/s'));
print_r($parts);
echo "<br>";
// Year, month, day, hour, minute, second
// $parts is array('1975', '03','10', '16','45', '00'))


// Printing in a specified format - too many options to list here.
print date('d/M/Y') . "<br>";
print date('d/m/y') . "<br>";
$when = new DateTime();
print $when->format('d/M/Y') . "<br>";

// Finding the difference between two dates, using DateTime::diff()

// 7:32:56 pm on May 10, 1965
$first = new DateTime("1965-05-10 7:32:56pm",
new DateTimeZone('America/New_York'));

// 4:29:11 am on November 20, 1962
$second = new DateTime("1962-11-20 4:29:11am",
new DateTimeZone('America/New_York'));

$diff = $second->diff($first);
printf("The two dates have %d weeks, %s days, " .
"%d hours, %d minutes, and %d seconds " .
"elapsed between them.",
floor($diff->format('%a') / 7),
$diff->format('%a') % 7,
$diff->format('%h'),
$diff->format('%i'),
$diff->format('%s'));
echo "<br>";
//The two dates have 128 weeks, 6 days, 15 hours, 3 minutes, and 45
//seconds elapsed between them. Because the two dates are on
// different sides of DST switch, we actually lost an hour!!!

// 7:32:56 pm on May 10, 1965
$first_local = new DateTime("1965-05-10 7:32:56pm",
new DateTimeZone('America/New_York'));

// 4:29:11 am on November 20, 1962
$second_local = new DateTime("1962-11-20 4:29:11am",
new DateTimeZone('America/New_York'));

$first = new DateTime('@' . $first_local->getTimestamp());
$second = new DateTime('@' . $second_local->getTimestamp());

$diff = $second->diff($first);
printf("The two dates have %d weeks, %s days, " .
"%d hours, %d minutes, and %d seconds " .
"elapsed between them.",
floor($diff->format('%a') / 7),
$diff->format('%a') % 7,
$diff->format('%h'),
$diff->format('%i'),
$diff->format('%s'));
echo "<br>";
// This time we recovered the hour lost!!!

// Finding the day in a week, month, or year, and Benjamin Franklin's bd
print "Today is day " . date('d') . ' of the month and ' . date('z') .
' of the year.';
print "<br>";
$birthday = new DateTime('January 17, 1706', new DateTimeZone('America/New_York'));
print "Benjamin Franklin was born on a " . $birthday->format('l') . ", " .
"day " . $birthday->format('N') . " of the week." . "<br>";
// options are 'd' month day, 01-31, 'j' month 1-31, 'z' 0-365, 'N' 1-7
// 'D' abbvrev weekday name, 'l' full weekday name

// Check if it's Monday!
if (1 == date('w')) {
print "Welcome to the beginning of your work week." . "<br>";
}
