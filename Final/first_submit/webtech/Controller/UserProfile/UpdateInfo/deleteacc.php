<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location: ../../../View/Authentication/login.html');
    exit;  
} else {
 
    require_once('../../../Model/PersonalData/deleteacc.php');
    


 if ($_REQUEST['action'] == "delete"){
    $id = $_SESSION['userid'];
    var_dump($_REQUEST);
    
  $result=deleteAccount();
  if($result){
    header('location:../../../View/Authentication/signup.html');
    exit;
  }
}
}