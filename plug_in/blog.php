<?php
    //include("./db/db_functions.php");
    $data= get_all_data_from_table('blog');
    // $data=array();
    // $select= $conn->prepare("select * from `blog` order by `id` desc");
    // $select->execute();
    // $result = $select->fetchAll(\PDO::FETCH_ASSOC);
    // $total_row=$select->rowCount();
    // if($total_row>0)
    // {
    //     foreach($result as $row)
    //         {
    //         $data[]=$row;
    //         }
    // }
    // else
    // {
    //     //$_SESSION['error']= "Email or password is wrong";
    // }
    // echo "<pre>";
    // print_r($data);
    // echo "<pre>";
?>
<h2> Blog Updates</h2>
<div class="container">
    <?php
    for($i=0; $i<count($data); $i++){
        if($data[$i]['status']=='1'){
    ?>
        <div class="row">
            <div class="col-md-2">
                <img src="<?php echo $data[$i]['image'];?>" class="img-thumbnail">
            </div>
            <div class="col-md-9">
                <h3><a href="post.php?id=<?php echo $data[$i]['id'];?>"><?php echo $data[$i]['title'];?></a></h3>
                <p> <?php echo $data[$i]['s_desc'];?><p>
                <p><address><?php echo $data[$i]['auth'];?></address>
            </div>    
        </div>
        <hr>

    <?php
    }
}
    ?>

</div>