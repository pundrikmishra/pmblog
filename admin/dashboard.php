<?php include('../db/db_setup.php') ?>
<?php $data= get_all_data_from_table('blog'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php   include('panel_head.php');   ?>
</head>
<body>
    <div class="container">
        <h1>Blog Dashboard</h1>
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
        <table class="table table-hover">
            <tr>
                <th>Index</th>
                <th>Title</th>
                <th>Option</th>
            </tr>   
            <?php
                for($i=0; $i<count($data);$i++)
                {
                    $num=$i+1;
                    echo "<tr>";
                        echo "<td>".$num."</td>";
                        echo "<td>".$data[$i]['title']."</td>";
                        //echo "<td>".'Edit'."</td>";
                        echo "<td>";
                            echo "<a href='edit_post.php?id=".$data[$i]['id']."'><div class='btn btn-default'>Edit</div></a>";
                            if($data[$i]['status']== 1){
                                echo "<a href='post_opr.php?id=".$data[$i]['id']."&opr=lock'><div class='btn btn-default'>Lock</div></a>";
                            }else {
                                echo "<a href='post_opr.php?id=".$data[$i]['id']."&opr=unlock'><div class='btn btn-default'>Unlock</div></a>";
                            }
                            echo "<a href='post_opr.php?id=".$data[$i]['id']."&opr=del'><div class='btn btn-default'>Delete</div></a>";
                        echo "</d>";
                    echo "</tr>";
                }
            ?>
        </table>

    </div>
<?php   include('panel_script.php');   ?>    
</body> 
</html>