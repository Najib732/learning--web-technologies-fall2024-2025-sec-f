<?php
session_start();
require_once('../model/sql.php');

function isValidUsername($username)
{

    for ($i = 0; isset($username[$i]); $i++) {
        $char = $username[$i];
        if (!(($char >= 'A' && $char <= 'Z') || ($char >= 'a' && $char <= 'z') || $char == ' ')) {
            return false;
        }
    }
    return true;
}

function isValidPassword($password)
{

    $length = 0;
    $hasSpecialChar = false;
    $specialChars = ['&', '$', '@', '!', '%', '*', '?'];

    for ($i = 0; isset($password[$i]); $i++) {
        $length++;
        for ($j = 0; isset($specialChars[$j]); $j++) {
            if ($password[$i] === $specialChars[$j]) {
                $hasSpecialChar = true;
                break;
            }
        }
    }

    if ($length > 5 && $hasSpecialChar) {
        return true;
    }
    return false;
}





if (isset($_REQUEST['submit'])) {
    $username  = $_REQUEST['username'];
    $password  = $_REQUEST['password'];
    $email     = $_REQUEST['email'];
    $dob       = $_REQUEST['date'];

    $username = removeSpaces($username);
    $password = removeSpaces($password);

    if ($username === "" || $password === "" || $email === "" || $dob === "") {
        echo "Null data found!";
    } else if (!isValidUsername($username)) {
        echo "Username can only contain letters and spaces.";
    } else if (!isValidPassword($password)) {
        echo "Password must be at least 6 characters long and contain one special character.";
    } else {
        $status = addUser($username, $password, $email, $dob);
        if ($status) {
            header('location: ../view/login.html');
        } else {
            header('location: ../view/signup.html');
        }
    }
} else {
    header('location: ../view/sign.html');
}

function removeSpaces($string)
{
    $start = 0;
    $end = countString($string) - 1;


    while ($start <= $end && $string[$start] === ' ') {
        $start++;
    }

    while ($end >= $start && $string[$end] === ' ') {
        $end--;
    }

    $trimmed = "";
    for ($i = $start; $i <= $end; $i++) {
        $trimmed .= $string[$i];
    }
    return $trimmed;
}


function countString($string)
{
    $length = 0;
    while (isset($string[$length])) {
        $length++;
    }
    return $length;
}
