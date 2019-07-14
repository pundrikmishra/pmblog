<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include('panel_head.php');   ?>
</head>
<body>
    <div class="container">
        <h1> Edit Your Post</h1>
        <hr>
        <form method="post" action="submit_post.php">
            <label>Enter Post Title</label><br>
            <input type="text" class="form-control" name="title"><br>
            <label>Enter A Short Description</label><br>
            <input type="text" class="form-control" name="s_desc"><br>
            <label>Enter Post Data</label><br>
            <textarea class="form-control" id="editor1" name="post_data" rows="20" cols="60"> </textarea><br>
            <label>Enter Post Tags</label><br>
            <input type="text" class="form-control" name="tags"><br>
            <label>Enter Post Category</label><br>
            <input type="text" class="form-control" name="category"><br>
            <label>Select An Image To Uplode</label><br>
            <input type="file" name="image"><br><br>
            <input type="submit" class="btn btn-primary btn-lg" value="Update Post">  
        </form>  
    </div>
<?php   include('panel_script.php');   ?>    
</body> 
</html>