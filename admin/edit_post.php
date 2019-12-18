<?php include('../db/db_setup.php');
if(isset($_GET['id'])){
    $ref_id=$_GET['id'];
    $data= get_data_by_id('blog',$ref_id);
    print_r($data);
}else {
    header('location:dashboard.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include('panel_head.php');   ?>
</head>
<body>
    <div class="container">
        <h1> Edit Your Post</h1>
        <hr>
        <?php
        //for more then one error but this is not working.
        if(isset($_SESSION['success']))
        {
            foreach($_SESSION['success'] as $success)
            {
                echo "<font color='green'><b>".$success."</b></font><br>";
            }
            
            session_destroy();
        }
        elseif(isset($_SESSION['fail']))
        {
            foreach($_SESSION['fail'] as $_SESSION['fail'])
            {
                echo "<font color='red'><b>".$_SESSION['fail']."</b></font><br>";
            }  
            session_destroy();
        }
        // if(isset($_SESSION['success']))
        // {
            
        //         echo "<font color='green'><b>".$success."</b></font><br>";
            
        //     session_destroy();
        // }
        // elseif(isset($_SESSION['fail']))
        // {
        //     echo "<font color='red'><b>".$_SESSION['fail']."</b></font><br>";    
        //     session_destroy();
        // }


        ?>
        <form method="post" action="update_post.php" enctype="multipart/form-data" >
            <input type="hidden" name="id" value="<?php echo $data['0']['id'] ?>">
            <label>Enter Post Title</label><br>
            <input type="text" class="form-control" name="title" value="<?php echo $data['0']['title'] ?>"><br>
            <label>Enter A Short Description</label><br>
            <input type="text" class="form-control" name="s_desc" value="<?php echo $data['0']['s_desc'] ?>"><br>
            <label>Enter Post Data</label><br>
            <textarea class="form-control" id="editor1" name="post_data" rows="20" cols="60"> <?php echo $data['0']['description'] ?> </textarea><br>
            <label>Enter Post Tags</label><br>
            <input type="text" class="form-control" name="tags" value="<?php echo $data['0']['tags'] ?>"><br>
            <label>Enter Post Category</label><br>
            <input type="text" class="form-control" name="category" value="<?php echo $data['0']['category'] ?>"><br>
            <img src=" ../<?php echo $data['0']['image'] ?>" style="max-width:180px;"><br>
            <label>Select An Image To Uplode</label><br>
            <input type="file" name="image"><br><br>
            <input type="submit" class="btn btn-primary btn-lg" value="Update Post">  
        </form>  
    </div>
<?php   include('panel_script.php');   ?>    
</body> 
</html>