<?php

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'Final');
    return $con;
}

function login($name,$password)
{
    $con = getConnection();
    $sql = "SELECT FROM userdata WHERE 'user_name'=$name and 'user_password'=$password";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_row($result);

    if ($row == 1) {
        return true;
    } else {
        return false;
    }
}

function Registration($name, $contact, $username, $password)
{
    $con = getConnection();
    $sql = "INSERT INTO userdata (user_name, user_contact, user_username, user_password)  VALUES ('$name', '$contact', '$username', '$password')";
    $result = mysqli_query($con, $sql);



    if (mysqli_affected_rows($con)) {
        return true;
       
    }
    else{
        return false;
    }
}
