<?php

function get_all_data_from_table($table)
{
    $data=array();
    $select= $conn->prepare("select * from `".$table."` order by `id` desc");
    $select->execute();
    $result = $select->fetchAll(\PDO::FETCH_ASSOC);
    $total_row=$select->rowCount();
    if($total_row>0)
    {
        foreach($result as $row)
            {
            $data[]=$row;
            }
    }
    else
    {
        //$_SESSION['error']= "Email or password is wrong";
    }
return $data;

}


?>