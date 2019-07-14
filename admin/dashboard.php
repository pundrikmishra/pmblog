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
                        echo "<td>".'Edit'."</td>";
                    echo "</tr>";
                }
            ?>
        </table>

    </div>
<?php   include('panel_script.php');   ?>    
</body> 
</html>