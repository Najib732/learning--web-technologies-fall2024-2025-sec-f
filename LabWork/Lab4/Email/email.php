<?php

session_start();

if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $indexNo = 0;
    $no = 0;

    $length = strlen($email);

    $array = "@example.com";


    for ($i = 0; $i < $length; $i++) {
        if ($email[$i] == "@") {
            $indexNo = $i;
            break;
        }
    }

    $copyemail = substr($email, $indexNo, $length);



    if ($copyemail === $array) {
        $no = 1;
    }


    if ($email == null || $no != 1) {
        echo "Invalid Email";
    } else {
        echo "<b>$email</b> __ added successfully";
    }
}
