


<?php

session_start();

if (!isset($_SESSION['users'])) { 
    $_SESSION['users'] = []; 
} 

if(isset($_REQUEST['submit'])) {

    
    

    $Name = $_REQUEST['name'];
    $Email = $_REQUEST['email'];
    $Password = $_REQUEST['password'];
    $Mobile = $_REQUEST['mobile'];
 

   
    if (empty($Name) || empty($Password) || empty($Email) || empty($Mobile)) {
        echo "All fields are required!";
    } 

    else {
        $_SERVER['flag']=true;
        $_SESSION['username'] = $Name;
        $_SESSION['email'] = $Email;
        $_SESSION['password'] = $Password;
        $_SESSION['mobile'] = $Mobile;

        header('Location: login.html');
        
    }
    
}
?>

