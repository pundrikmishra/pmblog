<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include('panel_head.php');   ?>
</head>
<body>
    <div class="container">
        <h1> User Login Here </h1>
        <br>
        <form method="post" action="#">
            <label>Username or email </label><br>
            <input type="text" class="form-control input-lg" name="user"><br>
            <label>Password</label><br>
            <input type="password" class="form-control input-lg" name="pass"><br>
            <input type="submit" class="btn btn-primary" value="login">
        </form>   
    </div>
<?php   include('panel_script.php');   ?>    
</body> 
</html>