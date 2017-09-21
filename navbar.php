<!-- Navigational Bar -->
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header"> <a class="navbar-brand" href="index.php">Sale Property</a> </div>
    <div>
        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>

            <li><a href="#">About Us</a></li>
        </ul>
            <?php if (isset($_SESSION['username'])) { ?>
        <ul class="nav navbar-nav">
            <li><a href="project.php">Browse Project</a></li>
        </ul>
        
            <ul class="nav navbar-nav navbar-right">
            <li><a href="#">My Profile ( <?php echo $_SESSION['username']; ?> )</a> </li>
            <li><a href="Logout.php">Logout</a></li>
            <li>&nbsp &nbsp &nbsp &nbsp</li>
            </ul>
            
            <?php } else {?>
       
        <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Register</a></li>
        <li>&nbsp &nbsp &nbsp &nbsp</li>
        </ul>
            
        <?php } ?>    
            
        
            
         </div> </nav>


