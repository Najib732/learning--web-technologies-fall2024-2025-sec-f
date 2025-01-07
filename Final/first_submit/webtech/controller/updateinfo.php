<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location:login.html');
    exit;  
} else {
  
    require_once('../model/sql.php');
    $id = $_SESSION['userid'];


if (!empty($_REQUEST['newname'])) {
    $newname = $_REQUEST['newname'];
    $result = updatename($newname, $id);

    if ($result) {
        header("Location: ../view/userprofile.php?id=$id");
    } else {
        header("Location: ../view/userprofile.php?id=$id");
    }
} else if (!empty($_FILES['image']['name'])) {
    $targetDir = "../upload/";
    $targetFile = $targetDir . basename($_FILES['image']['name']);

    // Check if the upload was successful
    if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
        if (updateProfile($targetFile, $id)) {
            header("Location: ../view/userprofile.php?id=$id");
        } else {
            header("Location: ../view/userprofile.php?id=$id");
        }
    } 

    exit; 
} 

else if (empty($_REQUEST['action'])) {
    if ($_REQUEST['action'] == "new") {
       
        header("Location: ../view/userprofile.php?id=$id");
    } elseif ($_REQUEST['action'] == "update") {
       
        header("Location: ../view/userprofile.php?id=$id");;
    }
}




else if ($_REQUEST['action'] == "update") {
    $result = userdata($id);
    $livein = !empty($_REQUEST['livein']) ? $_REQUEST['livein'] : $result['livein'];
    $university = !empty($_REQUEST['university']) ? $_REQUEST['university'] : $result['university'];
    $college = !empty($_REQUEST['college']) ? $_REQUEST['college'] : $result['college'];
    $hometown = !empty($_REQUEST['hometown']) ? $_REQUEST['hometown'] : $result['hometown'];

    // Call the update function
    $updateSuccess = updateUserData($id, $livein, $university, $college, $hometown);

    if ($updateSuccess) {
        header("Location: ../view/userprofile.php?id=$id");
    } else {
        header("Location: ../view/userprofile.php?id=$id");
    }
    
}



else if ($_REQUEST['action'] == "password"){

    
    $old_password = $_REQUEST['old_password'];
    $new_password = $_REQUEST['new_password'];

    // Call the function to update the password
    $result = updatepassword($old_password, $new_password);

    if ($result) {
        header("Location: ../view/userprofile.php?id=$id");
     
    } else {
        
        header("Location: ../view/userprofile.php?id=$id");
      
    }
}

else if ($_REQUEST['action'] == "delete"){
    var_dump($_REQUEST);
    
  $result=deleteAccount();
  if($result){
    header('location:../view/signup.html');
    exit;
  }
}
}