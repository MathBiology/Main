<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
   
    <!-- basic form -->
    <?php if ($_SERVER['REQUEST_METHOD'] == 'GET') { ?>
        <form action="<?php echo htmlentities($_SERVER['SCRIPT_NAME']) ?>" method="post">
        What is your first name?
        <input type="text" name="first_name" />
        <input type="submit" value="Say Hello" />
        </form>
        <?php } else {
        echo 'Hello, ' . $_POST['first_name'] . '!';
        }
    ?>
</body>
</html>


