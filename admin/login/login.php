<?php
// ob_start();
// session_start();
include('../../db/db_setup.php');
if(!isset($_POST['admin_username_or_email']) && !isset($_POST['password'])){
    $_SESSION['error']= "Please login";
    header('location:../index.php');

}
else{


$Emailid=addslashes($_POST["admin_username_or_email"]);
$Password=md5(addslashes($_POST["password"]));
print_r($Password);
$select = $conn->prepare("SELECT * FROM `admin` where `a_email` OR `a_username` ='$Emailid' and `a_password`='$Password'");
$select->execute();
$result=$select->fetchAll();
$total_row=$select->rowCount();
if($total_row>0)
{
    foreach($result as $row)   {
        $_SESSION['a_username'] = $row['a_username'];
        echo "hi" ;
    	header('location:../dashboard.php');
       

    }
    
}
else
{
    $_SESSION['error']= "Email or password is wrong";
    echo "pudrfy" ;
}  
if(isset($_SESSION['error'])){
    echo "my" ;
    header('location:../index.php'); 
}
 }
?>