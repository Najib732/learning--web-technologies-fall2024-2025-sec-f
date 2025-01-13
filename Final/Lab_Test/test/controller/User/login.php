<?php
session_start();
require_once('../../Model/User/Login%26Reg.php');

    $name = $_POST['username'] ?? null;
    $password = $_POST['password'] ?? null;
   
  

    if (empty($username) || empty($password)) {
        echo "Null data found!";
    }

     else {
       $status = login($name,$password);
          if($status){
            $_SESSION['username'] = $username;
            echo "User Login Succesful";
            exit();
         }
         else{
            echo "Error 404 .Try Again $username";
         }
} 


?>
