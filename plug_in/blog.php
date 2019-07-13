<?php
    //$data= array();
    $select= $conn->prepare("select * from `blog` order by `id` desc");
    $select->execute();
    $result = $select->fetchAll(\PDO::FETCH_ASSOC);
    // foreach($result as $row)
    //     {
    //        $data[]=$row;
    //     }
    // echo "<pre>";
    // print_r($result);
    // echo "</pre>";
?>
<h2> Blog Updates</h2>
<div class="container">
    <?php
    for($i=0; $i<count($result); $i++){
    ?>
    
    <div class="row">
        <div class="col-md-2">
            <img src="<?php echo $result[$i]['image'];?>" class="img-thumbnail rounded">
        </div>
        <div class="col-md-9">
            <h3><?php echo $result[$i]['title'];?></h3>
            <p> <?php echo $result[$i]['s_desc'];?><p>
            <p><address><?php echo $result[$i]['auth'];?></address>
        </div>    
    </div>
    <hr>

    <?php
    }
    ?>

</div>