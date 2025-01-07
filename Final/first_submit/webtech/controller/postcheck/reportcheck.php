<?php
session_start();
require_once('../../model/sql.php');



if (isset($_REQUEST['submit'])) {
  $id = $_SESSION['userid'];
  $postid = $_REQUEST['postid'];
  $value = $_REQUEST['report'];
  $value2 = $_REQUEST['textreport'];

  if (empty($value) && empty($value2)) {
    header("Location: ../../view/report.php?id= $postid");
  } else if (!empty($value) && empty($value2)) {
    $check = report($postid, $value);
    if ($check) {
      header("Location: ../../view/welcome.php?id=$id");
    } else {
      header("Location: ../../view/welcome.php?id=$id");
    }
  } else if (empty($value) && !empty($value2)) {
    $check = report($postid, $value2);
    if ($check) {
      header("Location: ../../view/welcome.php?id=$id");
    } else {
      header("Location: ../../view/welcome.php?id=$id");
    }
  }
}
