<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include('panel_head.php');   ?>
</head>
<body>
    <div class="container">
        <h1> User Login Here </h1>
        <br>
        <form method="post" action="login/login.php">
            <label>Username or email </label><br>
            <input type="text" class="form-control input-lg" name="admin_username_or_email"><br>
            <label>Password</label><br>
            <input type="password" class="form-control input-lg" name="password"><br>
            <input type="submit" class="btn btn-primary" value="login">
        </form>   
    </div>
    <?php   include('panel_script.php');   ?>  
    <?php
    if(isset($_SESSION['error'])){
        echo "<p><font color='red'>".$_SESSION['error']."</font></p>";
        session_destroy();
    }
    else{

    }
    ?>  
</body> 
</html>