<?php
session_start();
require_once('../../Model/sql.php');



if (isset($_REQUEST['submit'])) {


  if( $_SESSION['page']=="Welcome"){
    
  $id = $_SESSION['userid'];

  $postid = $_REQUEST['post_id'];


  $value = $_REQUEST['report'];

  $value2 = $_REQUEST['textreport'];

  if (empty($value) && empty($value2)) {
    header("Location:../../View/Welcome/welcome.php?id=$id");
  } else if (!empty($value) && empty($value2)) {
    $check = report($postid, $value);
   
    if ($check) {
      header("Location:../../View/Welcome/welcome.php?id=$id");
    } else {
      header("Location:../../View/Welcome/welcome.php?id=$id");
    }
  } else if (empty($value) && !empty($value2)) {
    $check = report($postid, $value2);

    var_dump($check);
    exit;
    if ($check) {
      header("Location:../../View/Welcome/welcome.php?id=$id");
    } else {
      header("Location:../../View/Welcome/welcome.php?id=$id");
    }
  }
}
else if( $_SESSION['page']=="political"){
    
  $id = $_SESSION['userid'];

  $postid = $_REQUEST['post_id'];


  $value = $_REQUEST['report'];

  $value2 = $_REQUEST['textreport'];

  if (empty($value) && empty($value2)) {
    header("Location:../../View/Newspaper/Political/political.php?id=$id");
  } else if (!empty($value) && empty($value2)) {
    $check = report($postid, $value);
   
    if ($check) {
      header("Location:../../View/Newspaper/Political/political.php?id=$id");
    } else {
      header("Location:../../View/Newspaper/Political/political.php?id=$id");
    }
  } else if (empty($value) && !empty($value2)) {
    $check = report($postid, $value2);

    var_dump($check);
    exit;
    if ($check) {
      header("Location:../../View/Newspaper/Political/political.php?id=$id");
    } else {
      header("Location:../../View/Newspaper/Political/political.php?id=$id");
    }
  }
}


}

