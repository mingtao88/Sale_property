<!DOCTYPE html>
<html>
    <head>
        <title>Add document</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-1.11.1.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/validator.min.js" type="text/javascript"></script>
        <script src="js/jquery.raty.min.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    </head>
    
    <body>
        <?php
        session_start();
        include("navbar.php");
        include("dbFunctions.php");
        

        $propertyID = $_POST['property_id'];
        $title = $_POST['title'];
        $creation_date = date("Y-m-d");
        
        $targetPath = "file/";

        //TODO: modify the following code to store the name of the image file into variable $fileName
        $fileName = basename($_FILES['document']['name']);

        //TODO: modify the following code to store the intended complete path to store the image file into variable $completePath
        $completePath = $targetPath . $fileName;
     
        if (move_uploaded_file($_FILES['document']['tmp_name'], $completePath)) {
            $queryInsert = "INSERT INTO document
                (property_id, title, creation_date, url)
                VALUES ('$propertyID','$title','$creation_date','$fileName') ";
            
            $resultInsert = mysqli_query($link, $queryInsert) or die;
            
            mysqli_close($link);
        }else {
            echo $fileName;
        }
     
        ?>

        <div class="container">
          <h3>The Document has been created!<br/></h3><br> 
             Go back to <a href="project.php"> View project</a> 
        </div>
    </body>
</html>
