<?php
// Summary:
// foreach: Simplifies accessing each row directly without needing to track the row index.
//rowname[columnname];
// for: Requires you to manually manage the row index and access array elements using $array[$i].
//arrayname[rowname][columnname];

use LDAP\Result;

function getConnection()
{
    $con = mysqli_connect('127.0.0.1', 'root', '', 'webtech');
    return $con;
}

function login($username, $password)
{
    $con = getConnection();

    $sql = "SELECT id FROM userdata WHERE name='$username' AND password='$password'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if ($count == 1) {

        $row = mysqli_fetch_assoc($result);
        $userId = $row['id'];

        return true; // Login success
    } else {
        return false; // Login failed
    }
}




function autogenerateId()
{

    return rand(100000, 999999);
}

function addUser($name, $password, $email)

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
        return false; // Email already exists
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

        // Re-check for ID existence 
        $stmt = mysqli_prepare($con, "SELECT COUNT(*) FROM userdata WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_row($result);
        $idExists = (int)$row[0];
    }

    // Insert user data
    $stmt = mysqli_prepare($con, "INSERT INTO userdata (id, name, password, confirmpassword, email) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "issss", $id, $name, $password, $password, $email);
    $result = mysqli_stmt_execute($stmt);

    if ($result) {
        return true; // User added successfully
    } else {
        return false; // Error occurred during insertion
    }

    mysqli_close($con);
}





function getUser($id) {}


function getAllUser()
{
    $con = getConnection();
    $sql = "SELECT * FROM userdata";
    $result = mysqli_query($con, $sql);

    if ($result) {
        $users = []; // Initialize an empty array to store the rows

        while ($row = mysqli_fetch_assoc($result)) {
            $users[] = $row; // Add each row to the array
        }


        return $users; // Return the array of rows (actual data)
    } else {
        echo "Error: " . mysqli_error($con);
        return []; // Return an empty array in case of error
    }
}




function updateUser($name, $password, $email, $id)
{
    $con = getConnection(); // Ensure getConnection() works properly

    $sql = "UPDATE userdata SET name='$name', password='$password', email='$email' WHERE id=$id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        return true; // Query executed successfully
    } else {
        return false; // Query failed
    }
}


function deleteUser($id)
{
    $con = getConnection();
    $sql = "DELETE FROM userdata WHERE id='$id';";
    $result = mysqli_query($con, $sql);
    if ($result) {
        return true;
    } else {
        return false;
    }
}
