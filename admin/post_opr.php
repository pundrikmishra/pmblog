<?php
include('../db/db_setup.php');

if(isset($_GET['id'])){
    if($_GET['opr']=='lock'){
        $query= " UPDATE `blog` SET `status`='0' where `id`='".$_GET['id']."' ";

    }elseif ($_GET['opr']=='unlock') {
        $query= " UPDATE `blog` SET `status`='1' where `id`='".$_GET['id']."' ";
    }elseif ($_GET['opr']=='del') {
        $query= " DELETE from `blog` where `id`='".$_GET['id']."' limit 1 ";
    }else {
        $_SESSION['fail'][]="Unknown operation selected";
        header('location:dashboard.php');
    }

    if($query){
        if($conn->exec($query))
        {
            $_SESSION['success'][]="Processed successfully";
            header('location:dashboard.php');
        }
        else
        {
            $_SESSION['fail'][]="Unable to Process";
            header('location:dashboard.php');
        }


    }else {
        $_SESSION['fail'][]="Unable to Process";
        header('location:dashboard.php');
    }

}else {
    header('location:dashboard.php');
}

?>