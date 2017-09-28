<?php
include "dbFunctions.php";
$name = $_POST['name'];
$startDate = $_POST['start_date'];
$endDate = $_POST['end_date'];

        $queryInsert = "INSERT INTO project 
                        (name, start_date, end_date)
                        VALUES ('$name','$startDate','$endDate')";
        $resultInsert = mysqli_query($link, $queryInsert) or die;
        
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Project</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/validator.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/feedback.js" type="text/javascript"></script>
    </head>
    
    <body>
        <?php
        include("navbar.php");       
        ?>
        
        <div class="container">
          <h3>The Project <?php echo $name; ?> has been created!<br/></h3><br>
             Go back to <a href='project.php'>Browse Project</a> 
        </div>
    </body>
</html>