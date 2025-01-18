<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location: ../../../View/Authentication/login.html');
    exit;  
} else {
 
    require_once('../../../Model/PersonalData/password.php');
    
 

 



if ($_REQUEST['action'] == "password"){
    $id = $_SESSION['userid'];
    
    $old_password = $_REQUEST['old_password'];
    $new_password = $_REQUEST['new_password'];

    // Call the function to update the password
    $result = updatepassword($old_password, $new_password);

    if ($result) {
        header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
     
    } else {
        
        header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
      
    }
}

}