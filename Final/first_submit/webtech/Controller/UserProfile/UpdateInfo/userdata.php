<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location: ../../../View/Authentication/login.html');
    exit;  
} else {
 

    require_once('../../../Model/PersonalData/userdata.php');
 


 if ($_REQUEST['action'] == "update") {
    $id = $_SESSION['userid'];
    $result = userdata($id);
    $livein = !empty($_REQUEST['livein']) ? $_REQUEST['livein'] : $result['livein'];
    $university = !empty($_REQUEST['university']) ? $_REQUEST['university'] : $result['university'];
    $college = !empty($_REQUEST['college']) ? $_REQUEST['college'] : $result['college'];
    $hometown = !empty($_REQUEST['hometown']) ? $_REQUEST['hometown'] : $result['hometown'];

    // Call the update function
    $updateSuccess = updateUserData($id, $livein, $university, $college, $hometown);

    if ($updateSuccess) {
        header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
    } else {
        header("Location: ../../../View/UserProfile/userprofile.php?id=$id");
    }
    
}




}