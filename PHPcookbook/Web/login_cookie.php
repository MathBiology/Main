<!-- Cookie login validation. Scrambles username in cookie for security. -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <pre>
        <?php
        function validate($user, $pass) {
            /* replace with appropriate username and password checking,
            such as checking a database */
            $users = array('david' => 'fadj&32',
            'adam' => '8HEj838');
            
            if (isset($users[$user]) && ($users[$user] === $pass)) {
                return true;
            } else {
                return false;
            }
        }
        

        ?>   
    </pre>
    
    <!-- A simple authentication login form -->
    <form method="POST" action="login.php">
    Username: <input type="text" name="username"> <br>
    Password: <input type="password" name="password"> <br>
    <input type="submit" value="Log In">
    </form>
    
</body>
<?php 
    // If successful, put username hash in a cookie with a secret
    // word so they can't make up an authentication cookie falsely
    $secret_word = 'if i ate spinach';
    if (validate($_POST['username'],$_POST['password'])) {
        setcookie('login',
        $_POST['username'].','.md5($_POST['username'].$secret_word));
    }

    // Verifying a login cookie
    unset($username);
    if (isset($_COOKIE['login'])) {
        list($c_username, $cookie_hash) = split(',', $_COOKIE['login']);
        if (md5($c_username.$secret_word) == $cookie_hash) {
            $username = $c_username;
        } else {
            print "You have sent a bad cookie.";
        }
    }

    if (isset($username)) {
    print "Welcome, $username.";
    } else {
    print "Welcome, anonymous user.";
    }
?>
</html>


