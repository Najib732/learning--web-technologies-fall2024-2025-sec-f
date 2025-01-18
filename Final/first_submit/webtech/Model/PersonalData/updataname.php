<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $con;
}

function updatename($name, $id)
{

    $con = getConnection();

    $sql = "UPDATE userdata SET name = '$name' WHERE id = '$id'";
    $result = mysqli_query($con, $sql);
    if ($result) {

        if (mysqli_affected_rows($con) > 0) {
            mysqli_close($con);
            return true;
        } else {
            mysqli_close($con);
            return "No changes made or record not found.";
        }
    } else {

        $error = mysqli_error($con);
        mysqli_close($con);
        return "Error: " . $error;
    }
}


?>