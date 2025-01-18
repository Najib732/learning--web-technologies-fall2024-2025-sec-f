<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location: ../../../View/Authentication/login.html');
    exit;  
} else {
 

    require_once('../../../Model/PersonalData/updataname.php');
   


if (!empty($_REQUEST['newname'])) {
    $id = $_SESSION['userid'];
    var_dump($id);
    $newname = $_REQUEST['newname'];
    $result = updatename($newname, $id);

    if ($result) {
        header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
    } else {
        header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
    }
} 
}