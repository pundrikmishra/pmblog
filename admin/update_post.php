<?php
include('../db/db_setup.php');
// print_r( $_POST);
// print_r( $_FILES['image']);

if(isset($_POST['id']) and $_POST['id']!=''){
    $location='edit_post.php?id='.$_POST['id'];

    if(check_spcl($_POST['title'])==0){
        $_SESSION['fail'][]="Sorry limited characters allowed in title ";
    }else{
        $title=addslashes($_POST['title']);
    }
    
    $date=date('d-m-y');
    
    $auth="pm";
    
    $s_desc=addslashes($_POST['s_desc']);
    
    $post_data=addslashes($_POST['post_data']);
    
    if(check_spcl($_POST['tags'])==0){
        $_SESSION['fail'][]="Sorry limited characters allowed in tags ";
    }else{
    $tags=addslashes($_POST['tags']);
    }
    
    if(check_spcl($_POST['category'])==0){
        $_SESSION['fail'][]="Sorry limited characters allowed in category ";
    }else{
    $category=addslashes($_POST['category']);
    }
    
    $status="1";

    $image_file=$_FILES['image'];
    if($image_file['name'])
    {
        $format=array('jpeg','jpg','png','gif');
        $temp=explode('/',$image_file['type']);
        foreach($format as $ext)
        {
            if ($ext == $temp[1])
            {
                $new_image=addslashes($image_file['name']);
            }

        }
    
        if($new_image)
        {
            $target='../img/'.$new_image;
            if(move_uploaded_file($image_file['tmp_name'],$target))
            {
                $_SESSION['success'][]="New File Uploaded Sucessfully";
                $image='img/'.$new_image;

            }
            else
        {
                $_SESSION['fail'][]= "unable to uploade file";
            }

        }
        else {
            $_SESSION['fail'][]="Please Upload An image file";
        }

        if(!isset($_SESSION['fail'])){
            $query ="UPDATE `blog` SET `title`='".$title."',`date`='".$date."',`auth`='".$auth."',`s_desc`='".$s_desc."',`description`='".$post_data."',`tags`='".$tags."',`category`='".$category."',`status`='".$status."', `image`='".$image."' WHERE `id`='".$_POST['id']."'";
            //$conn->exec($query);
            if($conn->exec($query))
            {
                $_SESSION['success'][]="Post Updated successfully";
                header("location:$location");
            }
            else
            {
                $_SESSION['fail'][]="Post Updated Failed";
                header("location:$location");
            }
        }
        else{
            header("location:$location");
        }
    }else {
        if(!isset($_SESSION['fail'])){
            $query ="UPDATE `blog` SET `title`='".$title."',`date`='".$date."',`auth`='".$auth."',`s_desc`='".$s_desc."',`description`='".$post_data."',`tags`='".$tags."',`category`='".$category."',`status`='".$status."' WHERE `id`='".$_POST['id']."'";
            //$conn->exec($query);
            if($conn->exec($query))
            {
                $_SESSION['success'][]="Post Updated successfully";
                header("location:$location");
            }
            else
            {
                $_SESSION['fail'][]="Post Updated Failed";
                header("location:$location");
            }
        }
        else{
            header("location:$location");
        }
    }
}else {
    header('location:dashboard.php');
}
?>