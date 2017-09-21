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
        $id = $_GET['property'];
        $projectName = $_GET['projectName'];
        include("navbar.php");
        include("dbFunctions.php");
        
        $querySelect = "SELECT * FROM property where project_id = " . $id;
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));
        
        while ($rowSelect = mysqli_fetch_assoc($resultSelect)){
                            
                            $arrResult[]=$rowSelect;
                           
                        }
        ?>
        
<div class="container">
  <h2><?php echo $projectName; ?></h2>
  <p>Raise your profile and be the preferred property agent of a particular project, estate or district, for potential buyers and sellers to go-to.</p>   <br>         
  <table class="table table-hover">
    <thead>
      <tr>
        <th>Property ID</th>
        <th>Block</th>
        <th>Street Name</th>
        <th>Unit Number</th>
        <th>Sale Price</th>
        <th>Status</th>
      </tr>
    </thead>
    
    <tbody>
        
      
        <?php for ($i=0 ; $i<count($arrResult); $i++){   ?>
        <tr>
        <td><a href="propertyDetails.php?propertyID=<?php echo $arrResult[$i]['property']; ?>&projectName=<?php echo $projectName; ?>&projectID=<?php echo $id; ?>"><?php echo $arrResult[$i]['property']; ?> </a></td>
        <td> BLK <?php echo $arrResult[$i]['block']; ?>  </td>
        <td> <?php echo $arrResult[$i]['street']; ?> </td>
        <td> # <?php echo $arrResult[$i]['unit']; ?> </td>
        <td> $ <?php echo $arrResult[$i]['target_sale_price']; ?> </td>
        <td> <?php echo $arrResult[$i]['status']; ?> </td>
        </tr>
        <?php } ?>
      

    </tbody>
  </table>
</div>
    </body>
</html>