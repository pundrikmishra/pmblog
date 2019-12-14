<?php
//print_r($_POST);
include('../db/db_setup.php');
if(check_spcl($_POST['title'])==0){
    $_SESSION['fail']="Sorry limited characters allowed in title ";
    echo $_SESSION['fail'];
    header('location:edit_post.php');

}else{
    echo $_POST['title'];
}

$date=date('d-m-y');
$auth="pm";
$s_desc=$_POST['s_desc'];
$post_data=$_POST['post_data'];

if(check_spcl($_POST['tags'])==0){
    $_SESSION['fail']="Sorry limited characters allowed in tags ";
    header('location:edit_post.php');
}else{
$tags=$_POST['tags'];
}

if(check_spcl($_POST['category'])==0){
    $_SESSION['fail']="Sorry limited characters allowed in category ";
    header('location:edit_post.php');
}else{
$category=$_POST['category'];
}

$status="1";
//$image=$_POST['image'];

// $query ="INSERT INTO `blog`(`title`, `date`, `auth`, `s_desc`, `description`, `tags`, `category`, `status`) VALUES ('".$title."','".$date."','".$auth."','".$s_desc."','".$post_data."','".$tags."','".$category."','".$status."')";
// //$conn->exec($query);
// if($conn->exec($query))
// {
//     $_SESSION['success']="New record created successfully";
//     header('location:edit_post.php');
// }
// else
// {
//     $_SESSION['fail']="Failed";
//     header('location:edit_post.php');
// }


function check_spcl($str)
{
    if(preg_match_all('~[^A-Za_z0-9-,\s]~is',$str,$match))
    {
        return '0';

    }
    else
    {
        return '1';
    }
}
?>
