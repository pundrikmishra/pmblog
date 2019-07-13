<?php include_once('db/db_setup.php');
$val=$_GET['id'];
$data=get_data_by_key('id',$val,'blog');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include_once('site_head.php');   ?>
</head>
<body>
    <div class="container">
        <h1><?php echo $data[0]['title']; ?> </h1>
        <p><?php echo $data[0]['auth']; ?></p>
        <hr>
        <img src="<?php echo $data[0]['image']; ?>" clas="img" width="480px ">
        <p><?php echo $data[0]['s_desc']; ?></p>
        <p><?php echo $data[0]['description']; ?></p>
        <?php      ?>    
</div>






<?php   include_once('site_script.php');   ?>    
</body>

  
</html>