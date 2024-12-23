<?php

use LDAP\Result;

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'test');
    return $con;
}

function login($username, $password)
{
    $con = getConnection();
    $sql = "SELECT * FROM userdata WHERE name='{$username}' AND password='{$password}'";
    $result = mysqli_query($con, $sql);
    $count =  mysqli_num_rows($result);

    if ($count == 1) {
        return true;
    } else {

        return false;
    }
}
function addUser($name, $password, $confirmpassword, $email)
{
    $con = getConnection();
    $sql = "INSERT INTO userdata (name, password, confirmpassword, email) 
        VALUES ('{$name}', '{$password}', '{$confirmpassword}', '{$email}')";

    if (mysqli_query($con, $sql)) {
        return true;
    } else {
        return false;
    }
}

function getUser($id) {}


function getAllUser()
{
    $con = getConnection();
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($con, $sql);
    return $result;
}



function updateUser($user) {}

function deleteUser($id) {}
