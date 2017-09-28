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
    
$("#defaultTable").on("click", "td button", function () {
        var id = $(this).val();
        $.ajax({
            url: "http://localhost/sale_property/getProjectDetails.php",
            data: "id=" + id,
            type: "GET",
            cache: false,
            dataType: "JSON",
            success: function (data) {
                $('[name=name]').val(data.name);
                $('[name=project_id]').val(data.project_id);
                $('[name=start_date]').val(data.start_date);
                $('[name=end_date]').val(data.end_date);
                $('#myModal2').modal('show');  
            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        });
    })
    
    
      $('#defaultForm2').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            $.ajax({
                url: "http://localhost/sale_property/doEditProject.php",
                type: "POST",
                data: $('#defaultForm2').serialize(),
                dataType: "JSON",
                success: function (data) {
                    $('#myModal2').modal('hide');
                    location.reload();
                },
                error: function ()
                {
                    alert('Error adding data');
                }
            });
         }
    });



    $("#defaultForm2").on("click", ".btnDelete", function () {
        var id = $('[name=project_id]').val();
        

                
        $.ajax({
            url: "http://localhost/sale_property/deleteProject.php",
            data: "id=" + id,
            type: "GET",
            cache: false,
            dataType: "JSON",
            success: function (data) {
                var r = confirm("confirm to delete?");
                if (r == true){
                    location.reload();
                }
                else {}
                
            },
            error: function (obj, textStatus, errorThrown) {
                console.log("Error " + textStatus + ": " + errorThrown);
            }
        
        });
    });
    
    
    
    
    })
    
    ;
    
       </script> 
    </head>
    
    <body>
        <?php
        include("navbar.php");
        include("dbFunctions.php");
        
        $querySelect = "SELECT * FROM project  ";
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));
        
        while ($rowSelect = mysqli_fetch_assoc($resultSelect))
            {
            $arrResult[]=$rowSelect;
            }
        ?>
        
<div class="container">
    <h2>Property Projects
        
       <?php if ($_SESSION['role']=="admin") { ?>
        <button style="float:right;" type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Add New Project</button>
        <?php } ?></h2>
    
  <p>Raise your profile and be the preferred property agent of a particular project, estate or district, for potential buyers and sellers to go-to.</p><br>         
  
  <table id="defaultTable" class="table table-hover">
    <thead>
      <tr>
        <th>Project ID</th>
        <th>Project Name</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Status</th>
        <?php if ($_SESSION['role']=="admin") { ?>
        
        <th> </th>
        <?php } ?>
      </tr>
    </thead>
    
    <tbody>
        <?php for ($i=0 ; $i<count($arrResult); $i++){   ?>
        <tr>  
        <td> <?php echo $arrResult[$i]['project_id']; ?> </td>
        
        <?php
        $expire = $arrResult[$i]['end_date'];
        $today= date("Y-m-d");
        if($today > $expire){$status = "Ended"; } else { $status=  "Active"; } ?>
        <?php if ($status == "Active") { ?>
        <td> <a href="property.php?property_id=<?php echo $arrResult[$i]['project_id']; ?>&projectName=<?php echo $arrResult[$i]['name']; ?>"> <?php echo $arrResult[$i]['name']; ?> </a> </td>
        <?php } else { ?>
        <td> <?php echo $arrResult[$i]['name']; ?> </td>
        <?php } ?>
        
        <td> <?php echo $arrResult[$i]['start_date']; ?> </td>
        <td> <?php echo $arrResult[$i]['end_date']; ?> </td>
        
        <td <?php if($status == "Ended"){ ?> style="color:red" <?php }else { ?> style="color:green" <?php } ?>  ><?php echo $status ?></td>
                <?php if ($_SESSION['role']=="admin") { ?>
        <td> <button  type="button" class="btn btn-info btn-sm" value="<?php echo $arrResult[$i]['project_id']; ?>" data-toggle="modal" data-target="#myModal2" ><img src="img/edit.png" width="20px"></button></td>
        <?php } ?>
        </tr>
        <?php } ?>
    </tbody>
  </table>
</div>
               
        
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h2 class="modal-title">Add Project information</h2></center>
        </div>
        <div class="modal-body">
          
                
            <form id="defaultForm" class="form-horizontal" role="form" action="addProject.php" method="post" data-toggle="validator">
                
           <div class="form-group">
                <label class="control-label col-sm-3" for="name">Project Name:</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" name="name" 
                       required data-error="Project title is required"/>
                <div class="help-block with-errors"></div>
                </div>
            </div>
                
                <br>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="start_date">Start Date:</label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="start_date" name="start_date" 
                       required data-error="Start date is required"/>
                <div class="help-block with-errors"></div>
                </div>
            </div>
                
            <br>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="end_date">End Date:</label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="end_date" name="end_date" 
                       required data-error="End date is required"/>
                <div class="help-block with-errors"></div>
                </div>
            </div>
                
           
        </div>
        
        <div class="modal-footer"> <button type="submit" class="btn btn-primary">Add Project</button>
        </form>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div> 
    </div>
</div> 
        
        
        
        
        
        
        
        
        
        
        
        
        <div class="modal fade" id="myModal2" role="dialog">
<?php 


?>
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h2 class="modal-title">Edit Project information</h2></center>
        </div>
        <div class="modal-body">
            <p>
                
            <form id="defaultForm2" class="form-horizontal" role="form" action="#" method="post" data-toggle="validator">
                
                <input type="hidden" class="form-control" id="project_id" name="project_id" value=""> 
                
                <div class="form-group"> 
                    <label class="control-label col-sm-3" for="name">Project Name:</label>
                    <div class="col-sm-8"><div class="projectName"> 
                        <input type="text" class="form-control" id="name" name="name" required 
                               data-error="Project title is required" value="" >
                        <div class="help-block with-errors"></div>
                        </div></div>
                </div>
                
                <br>
               
                 <div class="form-group">
                <label class="control-label col-sm-3" for="start_date">Start Date:</label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="start_date" name="start_date" required 
                       data-error="Start date is required" >
                <div class="help-block with-errors"></div>
                </div>
            </div>
            <br>
            
            <div class="form-group">
                <label class="control-label col-sm-3" for="end_date">End Date:</label>
                <div class="col-sm-8">
                <input type="date" class="form-control" id="end_date" name="end_date" required 
                       data-error="End date is required"  >
                <div class="help-block with-errors"></div>
                </div>
            </div>
       
            <br>
              
  <div class="modal-footer"> 
                   <button type="submit"  class="btn btn-primary">Edit Project</button>
            <button type="button" name="deleteProject" class="btnDelete btn btn-danger">Delete Project</button>
        </div> </form>
       
            
       
 
        
      </div> 
    </div>
    </div></div>
        
        
        
    </body>
</html>