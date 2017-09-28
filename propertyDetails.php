<?php 
session_start();
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
        $projectID = $_GET['projectID'];
        $projectName = $_GET['projectName'];
        $propertyID = $_GET['propertyID'];
        include("navbar.php");
        include("dbFunctions.php");
        
        $querySelect = "SELECT * FROM property where property_id = " . $propertyID;
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));               
        ?>

        <div class="container">
            <?php 
              while ($rowSelect=mysqli_fetch_assoc($resultSelect)){
                    $property = $rowSelect['property_id'];
                    $block = $rowSelect['block']; 
                    $street = $rowSelect['street']; 
                    $unit = $rowSelect['unit'];
                    $status = $rowSelect['status'];
                    $target_price = $rowSelect['target_sale_price'];
                    $actual_price = $rowSelect['actual_sale_price'];
                    $description = $rowSelect['description'];
            ?>
            
            <h3><?php echo $projectName . ": " .$street; ?></h3><br><br>
            <div class="row">
                <div class="col-sm-5"><img width='90%' src="img/<?php echo $rowSelect['image']; ?>" class="img-rounded"/></div>
                <div class="col-sm-7">
  
                    
                    
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Property Details</a></li>
    <li><a data-toggle="tab" href="#menu1">Property Pricing</a></li>
    <li><a data-toggle="tab" href="#menu2">Property Documentation</a></li>
    
    <?php if ($_SESSION['role']=="agent") { ?>
        <?php if ($status != "Taken") { ?>
            <li><a data-toggle="tab" href="#menu3">Add Activity</a></li>
        <?php } ?>
    <?php } ?>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Property ID: <?php echo $property; ?></h3>
      <p>

          <br>
          <span class="glyphicon glyphicon-cloud"></span> <b>Project Name:</b> <?php echo $projectName ?><br><br>
          <?php if ($block != '') { ?>
          <span class="glyphicon glyphicon-cloud"></span> <b>Block:</b> <?php echo $block ?><br><br>
          <?php } ?>
         
          <span class="glyphicon glyphicon-cloud"></span> <b>Street:</b> <?php echo $street ?><br><br>
          <span class="glyphicon glyphicon-cloud"></span> <b>Unit No:</b> <?php echo $unit ?><br/><br/><br>
      
      <h4><?php echo $street; ?></h4>
      <?php echo $description; ?>
      </p>
    </div>
    
      
      
    <div id="menu1" class="tab-pane fade">
        <h3>Sale Price</h3>
        
        <p>Target markets can be separated into primary and secondary target markets. 
            Primary target markets are those market segments to which marketing efforts are primarily directed and 
            secondary markets are smaller or less important.
        </p><br>
      
        <blockquote class="blockquote blockquote-reverse">
            
            <h3 class="mb-0"><span class="glyphicon glyphicon-cloud"></span> Target Sale price: $ <?php echo $target_price ?></h3>
            <footer class="blockquote-footer"><span class="glyphicon glyphicon-cloud"></span> Sale price: $ <?php echo $actual_price ?></footer>
        
        </blockquote>
    </div>
    
      
      
    <div id="menu2" class="tab-pane fade">
        <h3>Property Documentation</h3>
        
        <br>Collect all necessary documents. 
        <br>An abstract of title can be received from 
        <br>E.g. a lawyer, notary, district court or a real estate agent.
        <p>
        <br>
        <?php if ($_SESSION['role'] == "admin") { ?>
        <button type="button" style="float:right" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal">Upload Document</button><br><br>
        <?php } ?>
        <table class="table table-bordered">
        <thead>
        <tr>
            <th>Document title </th>
            <th>Creation date</th>
            <th>File download</th>
        </tr>
        </thead>
<?php  
include("dbFunctions.php");

$queryDocument = "SELECT * FROM document where property_id= " .$propertyID ;
$resultDocument = mysqli_query($link, $queryDocument) or die(mysqli_error($link));

$howmany=mysqli_affected_rows($link);
?>        
    <tbody>
      
  <?php for ($i=0 ; $i<$howmany; $i++){ 
         $arrResultDocument=  mysqli_fetch_array($resultDocument);?>
        <tr><td><?php echo $arrResultDocument['title']; ?></td>
        <td><?php echo $arrResultDocument['creation_date']; ?></td>
        <td><a href="file\<?php echo $arrResultDocument['url']; ?>" download>  <img src="img/file.jpg" width='20%' class="img-rounded"/>  </a></td>
         </tr>
  <?php } ?>
     
   
    </tbody>
    
    
    
    
  </table>
        </p>
    </div>
      
      
      
    <div id="menu3" class="tab-pane fade">
        <h3>Activity Log<br/><br></h3>
        <form id="defaultForm" class="form-horizontal" role="form" action="doPropertyDetails.php" method="post" data-toggle="validator">
               
            <input type="hidden" class="form-control" id="property_id" name="property_id" value="<?php echo $propertyID; ?>"> 
     
 

                
    
                
    <br>
    
    <div class="form-group">
        <label class="control-label col-sm-3" for="target_start_date">Target Start Date:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="target_start_date" name="target_start_date" 
                   required data-error="Target Start Date is required"/>
             <div class="help-block with-errors"></div>
        </div>
    </div>
                
    <br>

    <div class="form-group">
        <label class="control-label col-sm-3" for="target_end_date">Target End Date:</label>
        <div class="col-sm-9">
            <input type="date" class="form-control" id="target_end_date" name="target_end_date" 
                  required data-error="Target End Date is required"/>
             <div class="help-block with-errors"></div>
        </div>
    </div>
    <br>
        <div class="form-group">
        <label class="control-label col-sm-3" for="description">Description:</label>
        <div class="col-sm-9">
            <textarea class="form-control" id="description" name="description"></textarea>
             <div class="help-block with-errors"></div>
        </div>
    </div>
                       
 
    
    <br>


 
   
    <div class="form-group"> 
        <div class="col-sm-offset-3 col-sm-10">
            <button type="submit" class="btn btn-primary">Add Activity</button>
        </div>
    </div>
        </form>
    </div>
</div>
                </div>
            </div>  
                <?php } ?>
        </div>
        
        
        
        
        
        
        
        
       <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Upload Documentation</h4>
        </div>

                
<form id="UploadForm" class="form-horizontal" role="form" action="addDocument.php" method="post" data-toggle="validator" enctype="multipart/form-data">
            <div class="modal-body">
            
            <div class="row">
            <div class="col-sm-offset-1 col-sm-3"><p> <img src="img/upload.png" width='100px' class="img-rounded"/></p></div>
            <div class="col-sm-6">    
                <bR>
        <label >Upload Document</label>
        <br>
        <input type="text" name="title" id="title" placeholder="File Title name" required/><br><br>
        <input type="file" name="document" id="document" required/>
        <input type="hidden" name="property_id" id="property_id" value="<?php echo $propertyID; ?>" required/>  <br>  

        
                
                
            </div>
            </div>
        </div>
        <div class="modal-footer">

            <button type="submit" class="btn btn-primary">Upload Document</button>

          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></div></form>
        
      </div>
      
    </div>
  </div>
   
        
        
        
        
        
    </body>
</html>