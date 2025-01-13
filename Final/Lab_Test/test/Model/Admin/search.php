<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'Final');
    return $con;
}
function search($name){
    $con=getConnection();
    $sql="SELECT * from userdata where 'user_data'=$name";
    $result=mysqli_query($con,$sql);

    if($result){
        return $row=mysqli_fetch_row($result);
    }
    else{
        false;
    }


}

?>