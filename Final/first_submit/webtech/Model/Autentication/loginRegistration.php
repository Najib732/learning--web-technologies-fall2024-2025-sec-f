<?php
// require_once('../Database/connection.php');

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $con;
}

function login($email, $password)
{
    $con = getConnection();
    $sql = "SELECT id FROM  userdata WHERE email='$email' AND password='$password'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        return $row['id'];
    } else {
        return false;
    }
}


function autogenerateId()
{

    return rand(100000, 999999);
}


function addUser($name, $password, $email, $dob)
{
    $con = getConnection();
    $sql = "SELECT COUNT(*) FROM userdata WHERE email = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_row($result);
    $emailExists = (int)$row[0];

    if ($emailExists > 0) {
        return false;
    }

    $id = autogenerateId();

    $sql = "SELECT COUNT(*) FROM userdata WHERE id = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_row($result);
    $idExists = (int)$row[0];

    while ($idExists > 0) {
        $id = autogenerateId(); 
        $sql = "SELECT COUNT(*) FROM userdata WHERE id = ?"; 

        $stmt = mysqli_prepare($con, $sql); 

      
        mysqli_stmt_bind_param($stmt, "i", $id); 

        mysqli_stmt_execute($stmt); 
        $result = mysqli_stmt_get_result($stmt); 

        $row = mysqli_fetch_row($result);
        $idExists = (int)$row[0]; 
    }

  
    $sql = "INSERT INTO userdata (id, name, password, email, dob) VALUES (?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "issss", $id, $name, $password, $email, $dob);
    $stmt->execute();

    return true;
}

?>