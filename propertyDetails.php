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
        $projectID = $_GET['projectID'];
        $projectName = $_GET['projectName'];
        $propertyID = $_GET['propertyID'];
        include("navbar.php");
        include("dbFunctions.php");
        
        $querySelect = "SELECT * FROM property where property = " . $propertyID;
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));
        
      
                        
        ?>
        

        
        <div class="container">
            <?php 
              while ($rowSelect=mysqli_fetch_assoc($resultSelect)){
                    $property = $rowSelect['property'];
                    $block = $rowSelect['block']; 
                    $street = $rowSelect['street']; 
                    $unit = $rowSelect['unit'];
                    $status = $rowSelect['status'];
                    $target_price = $rowSelect['target_sale_price'];
                    $actual_price = $rowSelect['actual_sale_price'];
                    
            ?>
            
            <h3><?php echo $projectName . " : " .$street; ?></h3><br><br>
            <div class="row">
                <div class="col-sm-5"><img width='90%' src="img/<?php echo $rowSelect['image']; ?>" class="img-rounded"/></div>
                <div class="col-sm-7">
                    
                            


  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Property Details</a></li>
    <li><a data-toggle="tab" href="#menu1">Property Pricing</a></li>
    <li><a data-toggle="tab" href="#menu2">Property Documentation</a></li>
    <li><a data-toggle="tab" href="#menu3">Project Status</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Property ID: <?php echo $property; ?></h3>
      <p>
          
 
            
          <br><span class="glyphicon glyphicon-cloud"></span><?php echo " " . $projectName . " : " .$street; ?><br><br>
            
                
                
                    <span class="glyphicon glyphicon-cloud"></span> Address: <?php echo "Blk" . $block . " " . " # " . $unit . " " . $street . " Singapore."; ?><br/>
                    <br/><br>
      <h4><?php echo $street; ?></h4>
                    
                    <br>
                    Property that jointly belongs to more than one party may be possessed or controlled thereby in very similar or very distinct ways, whether simply or complexly, whether equally or unequally. However, there is an expectation that each party's will rather discretion with regard to the property be clearly defined and unconditional,citation needed so as to distinguish ownership and easement from rent.

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
  <footer class="blockquote-footer"><span class="glyphicon glyphicon-cloud"></span> Market Sale price: $ <?php echo $actual_price ?></footer>
</blockquote>
        
      
 
    </div>
      
      
      

      
      
      
    <div id="menu2" class="tab-pane fade">
        <h3>Property Documentation</h3><br>Collect all necessary documents. <br>An abstract of title can be received from <br>E.g. a lawyer, notary, district court or a real estate agent.
        <p><br>
          
<table class="table table-bordered">
    <thead>
      <tr>
        <th>Document title</th>
        <th>Creation date</th>
        <th>File download</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Sale Purchase of Immovable Property Form</td>
        <td>2016-11-11</td>
        <td><a href="file\document.txt" download><img src="img/file.jpg" width='20%' class="img-rounded"/></a></td>
      </tr>
      <tr>
        <td>Paramount title</td>
        <td>2015-08-07</td>
        <td><a href="file\document.txt" download><img src="img/file.jpg" width='20%' class="img-rounded"/></a></td>
      </tr>

    </tbody>
  </table>
          
          
          
          
          </p>
    </div>
      
      
      
    <div id="menu3" class="tab-pane fade">
         <h3>Activity Log<br/><br>
            </h3>
            <form id="defaultForm" class="form-horizontal" role="form" action="dopropertyDetails.php" method="post" data-toggle="validator">
                
 
            <input type="hidden" class="form-control" id="property_id" name="property_id" value="<?php echo $propertyID; ?>"> 
     
    <div class="form-group">
        <label class="control-label col-sm-3" for="description">Description:</label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="description" name="description"> 
        </div>
    </div>
                
    <br>
    
    <div class="form-group">
        <label class="control-label col-sm-3">Status: </label>
        <div class="col-sm-9" name="status">
                        
            <select class="form-control" id="status" name="status" required>
                <option value="available">Available</option>
                <option value="reserved">Reserved</option>
                <option value="sold">Sold</option>
                <option value="handover">Handover</option>
            </select>
        <div class="help-block with-errors"></div>
        </div>
    </div>
                
    <br>
<div class="form-group">
        <label class="control-label col-sm-3" for="target_start_date">Target Start Date:</label>
        <div class="col-sm-9">
            <input type="Date" class="form-control" id="target_start_date" name="target_start_date">
        </div>
    </div>
                
    <br>

    <div class="form-group">
        <label class="control-label col-sm-3" for="target_end_date">Target End Date:</label>
        <div class="col-sm-9">
            <input type="Date" class="form-control" id="target_end_date" name="target_end_date">
        </div>
    </div>
                       
    <br>
    <div class="form-group">
        <label class="control-label col-sm-3" for="actual_start_date">Actual Start Date:</label>
        <div class="col-sm-9">
            <input type="Date" class="form-control" id="actual_start_date" name="actual_start_date"> 
        </div>
    </div>
    
    <br>

    <div class="form-group">
        <label class="control-label col-sm-3" for="actual_end_date">Actual End Date:</label>
        <div class="col-sm-9">
            <input type="Date" class="form-control" id="actual_end_date" name="actual_end_date">
        </div>
    </div>
                
    <br>
   
    <div class="form-group"> 
        <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary">Add Activity</button>
        </div>
    </div>
            </form>
    </div>
    
      
      
      
      
  </div>

                    
                    
                </div>
                
                
            </div>  <?php } ?>
        </div>
        
      
        
        
        
        
        
        
        
    </body>
</html>