<?php
session_start();
if (isset($_SESSION['username'])) {
    $message = "<p>Bye Bye " . $_SESSION['username'] . ". You have logged out.<br /><a href='index.php'>Back</a></p>";
    $_SESSION = array();
    session_destroy();
    
}
//Testing
?>
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
            <h3>Logout<br/><br>
            </h3>
           
            
        <?php

        echo $message;
        ?>
            
            
            
        </div>
    </body>
</html>