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
        
        <script>
            
            $(document).ready(function () {
                
                $('#edit').click(function(){
                var description = $('#description').val();
                var id = $('#activity_id').val();  
                var status = $('#status').val();
                var r = confirm("confirm to Update status?");  
                
                if (r == true) {
                    
                    $.ajax({
                        
                        type: "GET",
                        url: "http://localhost/sale_property/doEditActivity.php",
                        data: "activity_id="+ id + "&description="+ description + "&status="+ status,
                        cache: false,
                        dataType: "JSON",
                        success: function (response) {
                            location.reload();        
                        },
                        
                        error: function (obj, textStatus, errorThrown) {
                            console.log("Error " + textStatus + ": " + errorThrown);
                        }    
                    });  
                } 
                
                else {
                } 
                });
            });
        </script>
    </head>
    
    <body>
        <?php

        $propertyID = $_GET['property_id'];
        include("navbar.php");
        include("dbFunctions.php");
        $arrResult2 = array();
        
        $querySelect = "SELECT * FROM property,project where project.project_id = property.project_id and property_id = " . $propertyID;
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));     
        
        $querySelect2 = "SELECT * FROM activity where property_id = " . $propertyID;
        $resultSelect2 = mysqli_query($link, $querySelect2) or die(mysqli_error($link)); 
        
        while ($rowSelect2=mysqli_fetch_assoc($resultSelect2)){
            $arrResult2[]=$rowSelect2;
        }
        
        ?>

        <div class="container">
            <?php 
                while ($rowSelect=mysqli_fetch_assoc($resultSelect)){
                    $projectName = $rowSelect['project_id'];
                    $projectID = $rowSelect['name'];
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
            <li><a data-toggle="tab" href="#menu3">Status Update</a></li>
        </ul>
                
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Property ID: <?php echo $propertyID; ?></h3>
                <p>
                    
                    <br>
                    <span class="glyphicon glyphicon-cloud"></span><?php echo " " . $projectName . ": " .$street; ?><br><br>
                    <span class="glyphicon glyphicon-cloud"></span> Address: <?php echo "Blk" . $block . " " . " # " . $unit . " " . $street . " Singapore."; ?><br/><br/><br>
      
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
        <h3>Status Update </h3>
           <?php for ($i=0 ; $i<count($arrResult2); $i++){   ?>
        <br>
        
                <div class="form-group">
        <label class="control-label col-sm-3" for="target_start_date">Target Start Date:</label>
        <div class="col-sm-7">
        <input type="text" class="form-control" id="target_start_date" name="target_start_date" 
               required value="<?php echo $arrResult2[$i]['target_start_date']; ?> " readonly>
        </div>
        </div>
       
       
       <br>
       
               <div class="form-group">
        <label class="control-label col-sm-3" for="target_end_date">Target End Date:</label>
        <div class="col-sm-7">
        <input type="text" class="form-control" id="target_end_date" name="target_end_date" 
            required value="<?php echo $arrResult2[$i]['target_end_date']; ?>" readonly>
        </div>
        </div>
       <br>
               <div class="form-group">
        <label class="control-label col-sm-3" for="description">Description:</label>
        <div class="col-sm-7">
        <input type="text" class="form-control" id="description" name="description" 
            required value="<?php echo $arrResult2[$i]['description']; ?>">
        </div>
        </div>
       
               <input type="hidden" class="form-control" id="activity_id" name="activity_id" value="<?php echo $arrResult2[$i]['activity_id']; ?>">
                 <input type="hidden" class="form-control" id="status" name="status" value="<?php echo $arrResult2[$i]['status']; ?>">
        
       <br><Br>
        
       <?php if ($arrResult2[$i]['status'] == "Looking For Buyer"){ ?>
       <img src="img/1.png" style="float:left" width='60%' class="img-rounded"/>
           
           <?php } if ($arrResult2[$i]['status'] == "Reserved"){ ?>
        <img src="img/2.png" style="float:left" width='60%' class="img-rounded"/>
       
                  <?php } if ($arrResult2[$i]['status'] == "Payment"){ ?>
        <img src="img/3.png" style="float:left" width='60%' class="img-rounded"/>
       
                  <?php } if ($arrResult2[$i]['status'] == "Sold"){ ?>
        <img src="img/4.png" style="float:left" width='60%' class="img-rounded"/>
                  <?php } ?>  
       
   
       <br>
     
       

    
       


    
                
        <blockquote class="blockquote blockquote-reverse">

        <h3 class="mb-0"><span class="glyphicon glyphicon-cloud"></span> Status:  <?php echo $arrResult2[$i]['status'] ?></h3>
        <footer class="blockquote-footer"><span class="glyphicon glyphicon-cloud"></span> This is your current Status</footer>

        </blockquote> 
   

        
         <?php if ($_SESSION['role']=="agent") { ?>
        <button style="float:right" type="button" id="edit" class="btn btn-default  btn-md">Update Activity status</button>
        
           <?php }} ?>

        
 
</div>
                </div>
            </div>  
                <?php } ?>
        </div>
        
        
        
        
        
        

   
        
        
        
        
        
    </body>
</html>