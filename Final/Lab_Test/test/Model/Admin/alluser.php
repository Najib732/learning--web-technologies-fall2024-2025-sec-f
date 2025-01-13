<?php


function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'Final');
    return $con;
}

function AllUser()
{
    $con = getConnection();
    $sql = "SELECT * FROM userdata";

    $result = mysqli_query($con, $sql);

    $alldata = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $alldata[] = $row;
    }

    mysqli_close($con);
    return $alldata;
}
function Update($name,$contact,$username,$password,$id){
    $con=getConnection();
    $sql = "UPDATE userdata SET user_name='$name', user_contact='$contact', user_username='$username', user_password='$password' WHERE id=$id";

    $result=mysqli_query($con,$sql);

    if($result){
        return $result=mysqli_fetch_row($result);
    }
}

function drop($id)
{
    $con = getConnection();
    $sql = "DELETE FROM userdata WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        return true;
    } else {
        return false;
    }
}


?>


