<?php
    // Establishes connection to database; arguments are
    // 'db','user','password','table'.
    $connection = mysqli_connect('localhost', 'root', '', 'loginapp');  
    
    if(!$connection) {
        die("Database connection failed");
    }
?>
