<?php
session_start();
require_once('../../Model/Autentication/loginRegistration.php');
// require_once('../../Model/Welcome/welpost.php');



if (isset($_POST['submit'])) {
    $email  =  trim($_REQUEST['email']);
    $password  =  trim($_REQUEST['password']);

    if ($email == null || empty($password)) {
        echo "Null data found!";
    } else {

        $userId = login($email, $password); 
        if ($userId) {
           
            
            $_SESSION['userid'] = $userId;
            header('location: ../../View/Welcome/welcome.php?id=' . $userId);

           
        } else {
            echo "Invalid user"; 
        }
    }
} else {
   
    header('location: ../../View/Authentication/login.html');
    exit;
}
