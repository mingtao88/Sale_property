<?php
session_start();

include "dbFunctions.php";
$description = $_POST['description'];
$status = "Looking For Buyer";
$target_start_date = $_POST['target_start_date'];
$target_end_date = $_POST['target_end_date'];
$propertyID = $_POST['property_id'];
$agentID = $_SESSION['agent_id'];

$queryInsert = "INSERT INTO activity 
                        (property_id, agent_id, description, status,  
                         target_start_date, target_end_date)
                        VALUES ('$propertyID','$agentID','$description','$status','$target_start_date','$target_end_date')"; 

$resultInsert = mysqli_query($link, $queryInsert) or die;
mysqli_close($link);


    include "dbFunctions.php";
    
    $queryStatus = "UPDATE property 
        SET status = 'Taken' 
        WHERE property_id = '" . $propertyID . "'"; 
 

$resultStatus = mysqli_query($link, $queryStatus) or die; 
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sale Property</title>
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
          <h3>The property has been added!<br/></h3><br>
             Go back to <a href='index.php'>Home</a> 
        </div>
    </body>
</html>