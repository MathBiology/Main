// Reads in data in nice a clean HTML table.
<?php include "db.php";?>
<?php include "functions.php";?>

<?php include "includes/header.php" ?>

<div class="container">
    
    <div class="col-sm-6">
//Displays data from the database
    <pre>
  <?php readRows(); ?>
     </pre>
    </div>


<?php include "includes/footer.php"?>
