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
            $('#defaultForm :input').removeAttr('disabled');
        });
        
        $('#defaultForm').validator().on('submit', function (e) {
        if (!e.isDefaultPrevented()) {
            e.preventDefault();
            $.ajax({
                url: "http://localhost/sale_property/doEditAgent.php",
                type: "POST",
                data: $('#defaultForm').serialize(),
                dataType: "JSON",
                success: function (data) {
                    $('#defaultForm :input').attr('disabled');
                    location.reload();
                },
                error: function ()
                {
                    alert('Error adding data');
                }
            });
         }
    }); 
        
        $("#A_id").click(function() {
                     $("#ActivityTable").html("");
                    //alert('you clicked the button');
                    $.ajax({
                        type: "GET",
                        url: "sortActivityID.php",
                        cache: false,
                        success: function(msg) {
                            response = $.parseJSON(msg);
                            for (i = 0; i < response.length; i++) {                                
                                $("#ActivityTable").append("<tr><td>" + response[i].activity_id + "</td>" + "<td>" + " <a href=" + "activity.php?property_id="  + response[i].property_id + "> " + response[i].property_id + "</a></td>" 
                                        + "<td>" + response[i].name + "</td>" + "<td>" + response[i].actual_start_date + "</td>" 
                                        + "<td>" + response[i].actual_end_date + "</td>" + "<td>" + response[i].status + "</td></tr>");                                         
                            }
                         }
                    });
                });
                
         $("#P_id").click(function() {
                     $("#ActivityTable").html("");
                    //alert('you clicked the button');
                   $.ajax({
                        type: "GET",
                        url: "sortPropertyID.php",
                        cache: false,
                        success: function(msg) {
                            response = $.parseJSON(msg);
                            for (i = 0; i < response.length; i++) {                                
                                $("#ActivityTable").append("<tr><td>" + response[i].activity_id + "</td>" + "<td>" + " <a href=" + "activity.php?property_id="  + response[i].property_id + "> " + response[i].property_id + "</a></td>" 
                                        + "<td>" + response[i].name + "</td>" + "<td>" + response[i].actual_start_date + "</td>" 
                                        + "<td>" + response[i].actual_end_date + "</td>" + "<td>" + response[i].status + "</td></tr>");                                         
                            }
                         }
                    });
                });
                
                         $("#AgentName").click(function() {
                     $("#ActivityTable").html("");
                    //alert('you clicked the button');
                   $.ajax({
                        type: "GET",
                        url: "sortAgentName.php",
                        cache: false,
                        success: function(msg) {
                            response = $.parseJSON(msg);
                            for (i = 0; i < response.length; i++) {                                
                                $("#ActivityTable").append("<tr><td>" + response[i].activity_id + "</td>" + "<td>" + " <a href=" + "activity.php?property_id="  + response[i].property_id + "> " + response[i].property_id + "</a></td>" 
                                        + "<td>" + response[i].name + "</td>" + "<td>" + response[i].actual_start_date + "</td>" 
                                        + "<td>" + response[i].actual_end_date + "</td>" + "<td>" + response[i].status + "</td></tr>");                                         
                            }
                         }
                    });
                });
                
        $("#DateStart").click(function() {
                     $("#ActivityTable").html("");
                    //alert('you clicked the button');
                   $.ajax({
                        type: "GET",
                        url: "sortStartDate.php",
                        cache: false,
                        success: function(msg) {
                            response = $.parseJSON(msg);
                            for (i = 0; i < response.length; i++) {                                
                                $("#ActivityTable").append("<tr><td>" + response[i].activity_id + "</td>" + "<td>" + " <a href=" + "activity.php?property_id="  + response[i].property_id + "> " + response[i].property_id + "</a></td>" 
                                        + "<td>" + response[i].name + "</td>" + "<td>" + response[i].actual_start_date + "</td>" 
                                        + "<td>" + response[i].actual_end_date + "</td>" + "<td>" + response[i].status + "</td></tr>");                                         
                            }
                         }
                    });
                });
                
         $("#DateEnd").click(function() {
                     $("#ActivityTable").html("");
                    //alert('you clicked the button');
                   $.ajax({
                        type: "GET",
                        url: "sortEndDate.php",
                        cache: false,
                        success: function(msg) {
                            response = $.parseJSON(msg);
                            for (i = 0; i < response.length; i++) {                                
                                $("#ActivityTable").append("<tr><td>" + response[i].activity_id + "</td>" + "<td>" + " <a href=" + "activity.php?property_id="  + response[i].property_id + "> " + response[i].property_id + "</a></td>" 
                                        + "<td>" + response[i].name + "</td>" + "<td>" + response[i].actual_start_date + "</td>" 
                                        + "<td>" + response[i].actual_end_date + "</td>" + "<td>" + response[i].status + "</td></tr>");                                         
                            }
                         }
                    });
                });
                
        $("#TheStatus").click(function() {
                     $("#ActivityTable").html("");
                    //alert('you clicked the button');
                   $.ajax({
                        type: "GET",
                        url: "sortStatus.php",
                        cache: false,
                        success: function(msg) {
                            response = $.parseJSON(msg);
                            for (i = 0; i < response.length; i++) {                                
                                $("#ActivityTable").append("<tr><td>" + response[i].activity_id + "</td>" + "<td>" + " <a href=" + "activity.php?property_id="  + response[i].property_id + "> " + response[i].property_id + "</a></td>" 
                                        + "<td>" + response[i].name + "</td>" + "<td>" + response[i].actual_start_date + "</td>" 
                                        + "<td>" + response[i].actual_end_date + "</td>" + "<td>" + response[i].status + "</td></tr>");                                         
                            }
                         }
                    });
                });
    
});
</script>
        
    </head>
    
    <body>
        <?php
        include("navbar.php");
        if (isset($_SESSION['username'])) {
        include("dbFunctions.php");
        $arrResult2 =  array();
        $arrResult3 = array();
        
        $querySelect = "SELECT * FROM company  ";
        $resultSelect = mysqli_query($link, $querySelect) or die(mysqli_error($link));
        
        while ($rowSelect = mysqli_fetch_assoc($resultSelect))
            {
                $arrResult[]=$rowSelect;
            }
            
            
            
        
            $querySelect2 = "SELECT * FROM activity WHERE agent_id = '{$_SESSION['agent_id']}'"; 
            $resultSelect2 = mysqli_query($link, $querySelect2) or die(mysqli_error($link)); 
        
                while ($rowSelect2 = mysqli_fetch_assoc($resultSelect2))
                        {
                            $arrResult2[]=$rowSelect2;
                        }   
            
                        
                
            $querySelect3 = "SELECT * FROM activity, agent, company WHERE agent.agent_id = activity.agent_id "
                . "AND agent.company_id = company.company_id  "; 
            $resultSelect3 = mysqli_query($link, $querySelect3) or die(mysqli_error($link)); 
        
                while ($rowSelect3 = mysqli_fetch_assoc($resultSelect3))
                        {
                            $arrResult3[]=$rowSelect3;
                        } 
        $activity = Array();

   
        ?>
        
        

        
        
<div class="container">
    
        <div class="col-sm-3">  
            <br>
             
                 
            <div class="well well-lg" style="height:850px">
                    
                <center><img width='50%' src="img/person.png" class="img-rounded"/>  <Br><br><?php echo $_SESSION['name']; ?> (<?php echo $_SESSION['role']; ?>)</center><br><hr>
                         
                 

                     
<ul class="nav nav-pills nav-stacked">
    <li class="active"><a data-toggle="pill" href="#home" style="font-size:110%;" ><center>My Profile Information</center></a></li>

<?php if ($_SESSION['role']=="admin") { ?>   
<li><a data-toggle="pill" href="#menu1" style="font-size:110%;" ><center>View All Activity</center></a></li>
 <?php } ?>

<?php if ($_SESSION['role']=="agent") { ?>   
<li><a data-toggle="pill" href="#menu1" style="font-size:110%;" ><center>View My Activity</center></a></li>
<?php } ?>

<li><a data-toggle="pill" href="#menu2" style="font-size:110%;"><center>Change Password</center></a></li>

 <?php if ($_SESSION['role']=="admin") { ?>
<li><a data-toggle="pill" href="#menu3" style="font-size:110%;"><center>Add New Company</center></a></li>
<li><a data-toggle="pill" href="#menu4" style="font-size:110%;"><center>Create New User</center></a></li>
 <?php } ?>
</ul>


                     
                     <br><br><br><br><br><br>
            </div>
                 
            
                 
                 
                 
         
         
        </div>
        
<div class="col-sm-9">
    <br>

    <div class="well well-lg" style="height:850px">
        
        
         
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h2>My Profile Information  <button style="float:right;" type="button" class="btn btn-info btn-sm" id="edit" ><img src="img/edit.png" width="30px"></button></h2><hr><br> 
     
            
        <form id="defaultForm" class="form-horizontal" role="form" action="#" method="post" data-toggle="validator">
               
            <input type="hidden" class="form-control" id="agent_id" name="agent_id" value="<?php echo $_SESSION['agent_id']; ?>"> 
     
    <div class="form-group">
        <label class="control-label col-sm-3" for="username">Username:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" disabled> 
        </div>
    </div>
                
    <br>
    
    
    <div class="form-group">
        <label class="control-label col-sm-3" for="name">Full Name:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['name']; ?>" disabled> 
        </div>
    </div>
    
    <br>
    
    <div class="form-group">
        <label class="control-label col-sm-3" for="mobile">Contact Number:</label>
        <div class="col-sm-8">
            <input type="text" class="form-control" id="mobile" name="mobile" value="<?php echo $_SESSION['mobile']; ?>" disabled> 
        </div>
    </div>
    
    <br>
    
    <div class="form-group">
        <label class="control-label col-sm-3">Company:</label>
        <div class="col-sm-8" name="company">     
            <select class="form-control" id="company" name="company" required disabled>
                            <?php for ($i=0 ; $i<count($arrResult); $i++){   
                                if ($_SESSION['company_id'] == $arrResult[$i]['company_id']){?>
                            <option value="<?php echo $arrResult[$i]['company_id']; ?>" selected="selected"> 
                                <?php echo $arrResult[$i]['company_name']; ?> </option>
                            <?php }else { ?>
                                
                                <option value="<?php echo $arrResult[$i]['company_id']; ?>" > 
                                <?php echo $arrResult[$i]['company_name']; ?> </option> <?php
                            }}?>
            </select>
        <div class="help-block with-errors"></div>
        </div>
    </div>
                
    <br>
    
    <div class="form-group"> 
        
        
        <div class="col-sm-offset-9 col-sm-3">
            <button type="submit" class="btn btn-primary" id="Changes" disabled>Edit Changes</button>
        </div>
    </div>
        </form>
     
     
</div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    <div id="menu1" class="tab-pane fade">
        <?php if ($_SESSION['role']=="admin") { ?>
        <h2>View All Activity</h2><hr><br>
         <?php } ?>
        
        <?php if ($_SESSION['role']=="agent") { ?>
        <h2>View My Activity</h2><hr><br>
         <?php } ?>
        <p>
            
                    <table class="table table-hover">
                    
                    <?php if ($_SESSION['role']=="admin") {  ?> 
                    <thead>
                        <tr>
                     <th> <a href="sortActivityID.php" id="A_id" onclick="return false">Activity ID:</a></th>
                     <th> <a href="sortPropertyID.php" id="P_id" onclick="return false"> Property ID:</a></th>
                     <th> <a href="sortAgentName.php" id="AgentName" onclick="return false"> Agent Name:</a></th>
                     <th> <a href="sortStartDate.php" id="DateStart" onclick="return false"> Actual Start:</a></th>
                     <th> <a href="sortEndDate.php" id="DateEnd" onclick="return false"> Actual End:</a></th> 
                     <th> <a href="sortStatus.php" id="TheStatus" onclick="return false">Status:</a></th> 
                        </tr>
                    </thead>
                    
                    <?php } else { ?>
                    
                     <thead>
                        <tr>
                        <th>Activity ID:</th>
                        <th>Property ID:</th>
                        <th>Actual Start:</th>
                        <th>Actual End:</th> 
                        <th>Status:</th> 
                        </tr>
                    </thead>
                    
                    <?php } ?>
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                    
                            
                    <tbody id="ActivityTable">
                        <?php 
                            if ($_SESSION['role']=="agent") {
                            for ($i=0 ; $i<count($arrResult2); $i++){   ?>
                        <tr>
                        <td> <?php echo $arrResult2[$i]['activity_id']; ?> </td>
                        <td> <a href="activity.php?property_id=<?php echo $arrResult3[$i]['property_id']; ?>"> <?php echo $arrResult3[$i]['property_id']; ?> </a></td>
                        
                        <td><?php 
                        if ($arrResult2[$i]['actual_start_date'] == ""){
                        echo "-" ; 
                        } else { echo $arrResult2[$i]['actual_start_date']; 
                        } ?>
                        </td>
                        
                         <td> <?php 
                        if ($arrResult2[$i]['actual_end_date'] == ""){
                        echo "-" ; 
                        }else { echo $arrResult2[$i]['actual_end_date']; 
                        } ?> </td>
                        
                        <td> <?php echo $arrResult2[$i]['status']; ?> </td>
                        </tr>
                            <?php }}
                            else {
                         
                                
                        for ($i=0 ; $i<count($arrResult3); $i++){   ?>
                        <tr>
                            
                        <td> <?php echo $arrResult3[$i]['activity_id']; ?> </td>
                        
                        <td> <a href="activity.php?property_id=<?php echo $arrResult3[$i]['property_id']; ?>"> <?php echo $arrResult3[$i]['property_id']; ?> </a></td>
                        <td> <?php echo $arrResult3[$i]['name']; ?> </td>
                        
                        
                         <td><?php 
                        if ($arrResult3[$i]['actual_start_date'] == ""){
                        echo "-" ; 
                        } else { echo $arrResult3[$i]['actual_start_date']; 
                        } ?>
                        </td>
                        
                         <td> <?php 
                        if ($arrResult3[$i]['actual_end_date'] == ""){
                        echo "-" ; 
                        }else { echo $arrResult3[$i]['actual_end_date']; 
                        } ?> </td>
                        
                       <td> <?php echo $arrResult3[$i]['status']; ?> </td>
 
                              <?php  
                                
                                
                                
                            }}
                            
                            
                            ?>
                    </tbody>
                    
                    
                     

                    </table>
            
            
            
        </p>
    </div>
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      

      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
      
    <div id="menu2" class="tab-pane fade">
        <h2>Change Password</h2><hr><br>
      <p>
      
              <form id="ChangePassword" class="form-horizontal" role="form" action="doChangePassword.php" method="post" data-toggle="validator">
        
            <div class="form-group"> 
                <label class="control-label col-sm-3" for="oldPassword">Old Password:</label> 
                <div class="col-sm-8"> 
                    <input type="password" class="form-control" id="oldPassword" name="oldPassword" required> 
                </div> 
            </div> 
            
            <br>
            
             <div class="form-group"> 
                <label class="control-label col-sm-3" for="password">New Password:</label> 
                <div class="col-sm-8"> 
                    <input type="password" class="form-control" id="password" name="password" required> 
                </div> 
            </div> 
            
            <br>
            
             <div class="form-group"> 
                <label class="control-label col-sm-3" for="password2">Confirm New Password:</label> 
                <div class="col-sm-8"> 
                    <input type="password" class="form-control" id="password2" name="password2" required> 
                </div> 
            </div> 
            
            <br>

            <div class="form-group"> 
                <div class="col-sm-offset-3 col-sm-8"> 
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </div>
        </form>
      
      </p>
    </div>
      
      
      
      
      
      
      
      
      
      
      
         <div id="menu3" class="tab-pane fade">
        <h2>Add New Company</h2><hr><br>
      <p>
      
      <form id="ChangePassword" class="form-horizontal" role="form" action="doCompany.php" method="post" data-toggle="validator">
        
            <div class="form-group"> 
                <label class="control-label col-sm-3" for="company">Company Name:</label> 
                <div class="col-sm-8"> 
                    <input type="text" class="form-control" id="company" name="company" required> 
                    <div class="help-block with-errors"></div>
                </div> 
            </div> 
            
            <br>
            
             <div class="form-group"> 
                <label class="control-label col-sm-3" for="tel">Company Tel:</label> 
                <div class="col-sm-8"> 
                    <input type="tel" class="form-control" id="tel" name="tel" required> 
                    <div class="help-block with-errors"></div>
                </div> 
            </div> 
            
            <br>
            
  

            <div class="form-group"> 
                <div class="col-sm-offset-3 col-sm-8"> 
                    <button type="submit" class="btn btn-primary">Create Company</button>
                </div>
            </div>
        </form>
      
      </p>
    </div> 
      
        <div id="menu4" class="tab-pane fade">
        <h2>Create New User</h2><hr><br>
      <p>
      
      <form id="ChangePassword" class="form-horizontal" role="form" action="doRegister.php" method="post" data-toggle="validator">
        
                <div class="form-group">
                    <label class="control-label col-sm-3" for="name">Full Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="name" name="name" 
                        required data-error="Full name is required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                
                <br>

                <div class="form-group">
                    <div class="ui-widget">
                    <label class="control-label col-sm-3" for="mobile">Contact Number:</label>
                    <div class="col-sm-8"> 
                        <input type="text" class="form-control" id="mobile" name="mobile"  
                               requried required data-error="Mobile number is required"/>
                        <div class="help-block with-errors"></div>
                    </div>
                    </div>
                </div>
                
                <br>
               
                <div class="form-group">
                    <label class="control-label col-sm-3">Company:</label>
                    <div class="col-sm-8" name="company">
                        <select class="form-control" id="company" name="company">
                            <?php for ($i=0 ; $i<count($arrResult); $i++){   ?>
                            <option value="<?php echo $arrResult[$i]['company_id']; ?>"> 
                                <?php echo $arrResult[$i]['company_name']; ?> </option>
                            <?php } ?>
                        </select>
                        <div class="help-block with-errors"></div>
                    </div>
                </div>
                
                <br>
               
            <h3>Account information <br/><br></h3>
                
            <div class="form-group">
                <label class="control-label col-sm-3" for="username">Username:</label>
                <div class="col-sm-8">
                <input type="text" class="form-control" id="name" name="username" 
                       required data-minlength="6" data-minlength-error="Your name at least must have 6 letters" 
                       required data-error="Username is required"/>
                <div class="help-block with-errors"></div>
                </div>
            </div>
                
            <br>
            
            <div class="form-group">
                <label class="control-label col-sm-3">Role:</label>
                <div class="col-sm-8" name="role">
                        
                    <select class="form-control" id="role" name="role" required>
                        <option value="agent">agent</option>
                        <option value="agent">admin</option>
                    </select>
                        <div class="help-block with-errors"></div>
                </div>
            </div>
                
            <br>
                
            <div class="form-group">
                <label class="control-label col-sm-3" for="password">Password:</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="password" name="password" 
                       required data-minlength="6" data-minlength-error="Your password should be minimum 6 letters" 
                       required data-error="Password is required"/>
                <div class="help-block with-errors"></div>
                </div>
            </div>
                
            <br>
                
            <div class="form-group">
                <label class="control-label col-sm-3" for="ComfirmPassword">Confirm Password:</label>
                <div class="col-sm-8">
                <input type="password" class="form-control" id="ComfirmPassword" name="ComfirmPassword" 
                       required data-minlength="6" data-minlength-error="Your password should be minimum 6 letters" accept=" 
                       "required data-error="Password is required"/>
                <div class="help-block with-errors"></div>
                </div>
            </div>
                
            <br>
            
  

            <div class="form-group"> 
                <div class="col-sm-offset-3 col-sm-8"> 
                    <button type="submit" class="btn btn-primary">Register</button>
                </div>
            </div>
        </form>
      
      </p>
    </div> 
      
      
      
      
      
      
      
      
      
      
      
      
  </div>
         
             <br><br><br><br><br><br><br>
         
    </div>
        
        
</div>
        
        
</div>
        
        
        
        
        <?php }else {?>
        <div class="container"><h3>You are not Login!<br/><br></h3> Please <a href='login.php'>Login</a></div>
        <?php } ?>    
    </body>
</html>