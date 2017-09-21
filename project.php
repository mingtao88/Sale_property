<?php 
session_start();

?><!DOCTYPE html>
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
        include("dbFunctions.php");
        
        $querySelect = "SELECT * FROM project  ";
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));
        
        while ($rowSelect = mysqli_fetch_assoc($resultSelect)){
                            
                            $arrResult[]=$rowSelect;
                           
                        }
        ?>
        
<div class="container">
  <h2>Property Projects</h2>
  <p>Raise your profile and be the preferred property agent of a particular project, estate or district, for potential buyers and sellers to go-to.</p>   <br>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Project ID</th>
        <th>Project Name</th>
        <th>Start Date</th>
        <th>End Date</th>
      </tr>
    </thead>
    
    <tbody>
        
      
        <?php for ($i=0 ; $i<count($arrResult); $i++){   ?>
        <tr>
        <td> <?php echo $arrResult[$i]['project_id']; ?> </td>
        <td> <a href="property.php?property=<?php echo $arrResult[$i]['project_id']; ?>&projectName=<?php echo $arrResult[$i]['name']; ?>"> <?php echo $arrResult[$i]['name']; ?> </a> </td>
        <td> <?php echo $arrResult[$i]['start_date']; ?> </td>
        <td> <?php echo $arrResult[$i]['end_date']; ?> </td>
        </tr>
        <?php } ?>
      

    </tbody>
  </table>
</div>
    </body>
</html>