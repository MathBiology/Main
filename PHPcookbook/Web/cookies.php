<?php

// Arguments: cookie name, information, expirationtime (default -> end sess), 
// path to send cookies to, domain (pages whose hostname ends with domain), 
// default domain : send only to the same hostname where cookie was set,
// fifth option: boolean, if true send cookie only over SSL connection
setcookie('flavor','chocolatechip');

// first is sent to all hosts in example.com; if it was just example.com, it
// would not be sent to www.example.com or jeannie.example.com
// setcookie('flavor','chocolate chip',0,'','.example.com');

// second to jeannie.example.com
// setcookie('flavor','chocolate chip',0,'','jeannie.example.com');


// Reading cookie values -> look at the $_COOKIE superglobal array
if (isset($_COOKIE['flavor'])) {
print "You ate a {$_COOKIE['flavor']} cookie." . "<br>";
    } else {
        die("No cookies here bro.");
    }

// print names and values of all cookies sent in a particular request
foreach ($_COOKIE as $cookie_name => $cookie_value) {
print "$cookie_name = $cookie_value" . "<br>";
}


// Deleting cookies: set no value for cookie and past expiration time -
// and any default values if manually set!
setcookie('flavor','',1);

?>
