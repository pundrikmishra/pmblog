<?php
include('../db/db_setup.php');
print_r( $_POST);

if(isset($_POST['id']) and $_POST['id']!=''){
    $location='edit_post.php?id='.$_POST['id'];

    if(check_spcl($_POST['title'])==0){
        $_SESSION['fail'][]="Sorry limited characters allowed in title ";
    }else{
        $title=$_POST['title'];
    }
    
    $date=date('d-m-y');
    
    $auth="pm";
    
    $s_desc=$_POST['s_desc'];
    
    $post_data=$_POST['post_data'];
    
    if(check_spcl($_POST['tags'])==0){
        $_SESSION['fail'][]="Sorry limited characters allowed in tags ";
    }else{
    $tags=$_POST['tags'];
    }
    
    if(check_spcl($_POST['category'])==0){
        $_SESSION['fail'][]="Sorry limited characters allowed in category ";
    }else{
    $category=$_POST['category'];
    }
    
    $status="1";

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
    


}else {
    header('location:dashboard.php');
}
?>