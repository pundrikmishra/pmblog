<?php
//include('db_setup.php');
function get_all_data_from_table($table)
{
    $data=array();
    $select= $GLOBALS['conn']->prepare("select * from `".$table."` order by `id` desc");
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

function get_data_by_key($key,$val,$table)
{
    $data=array();
    $select= $GLOBALS['conn']->prepare("select * from `".$table."` where `".$key."` = '".$val."' ");
    $select->execute();
    $result = $select->fetchAll();
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

function get_data_by_id($table,$id)
{
    $data=array();
    $select= $GLOBALS['conn']->prepare("select * from `".$table."` where `id`='".$id."' order by `id` desc limit 1");//limit not required in this case because id is unique and thus return 1 row
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