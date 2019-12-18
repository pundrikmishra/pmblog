<?php
// print_r($_FILES);
include('../db/db_setup.php');
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

$image_file=$_FILES['image'];
$format=array('jpeg','jpg','png','gif');
$temp=explode('/',$image_file['type']);
foreach($format as $ext)
{
    if ($ext == $temp[1])
    {
        $new_image=$image_file['name'];
    }

}
 if($new_image)
 {
     $target='../img/'.$new_image;
     if(move_uploaded_file($image_file['tmp_name'],$target))
     {
         echo "File Uploaded Sucessfully";
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
    $query ="INSERT INTO `blog`(`title`, `date`, `auth`, `s_desc`, `description`, `tags`, `category`, `status`,`image`) VALUES ('".$title."','".$date."','".$auth."','".$s_desc."','".$post_data."','".$tags."','".$category."','".$status."','".$image."')";
    //$conn->exec($query);
    if($conn->exec($query))
    {
        $_SESSION['success'][]="New record created successfully";
        header('location:new_post.php');
    }
    else
    {
        $_SESSION['fail'][]="Failed";
        header('location:new_post.php');
    }
}
else{
    header('location:new_post.php');
}

// function check_spcl($str)
// {
//     if(preg_match_all('~[^A-Za_z0-9-,\s]~is',$str,$match))
//     {
//         return '0';

//     }
//     else
//     {
//         return '1';
//     }
// }
?>
