<?php
  session_start();
if (empty($_SESSION['userid'])) {
    header('Location: ../../../View/Authentication/login.html');
    exit;  
} else {
    require_once('../../../Model/sql.php');
 
 
    $id = $_SESSION['userid'];

if (isset($_REQUEST['submit'])) {
    $userId = $_SESSION['userid'];
    $postContent = null;
    $imagePath = null;
    $postType = "";

    $info = userdata($userId);

    $type = $_REQUEST['news'];


    if (!empty($_POST['postContent'])) {
        $postContent = htmlspecialchars($_POST['postContent'], ENT_QUOTES, 'UTF-8');
        $postType = "text";
    }

    if (!empty($_FILES["image"]["name"])) {
        $fileName = basename($_FILES["image"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);


        $allowTypes = array('jpg', 'png', 'jpeg', 'gif', 'JPG');
        if (in_array($fileType, $allowTypes)) {

            $targetDir = "../../../upload/";
            $targetFilePath = $targetDir . $fileName;

            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFilePath)) {

                $targetDir = "upload/";
                $targetFilePath = $targetDir . $fileName;

                $imagePath = $targetFilePath;
                
                $postType = "image";
            } else {
                echo "Failed to upload image.";
                exit;
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, PNG, & GIF are allowed.";
            exit;
        }
    }
    if ($postType == "text") {
        $status = savePost($userId, $postContent, 'text', $type);
    } elseif ($postType == "image") {

        $status = savePost($userId, $imagePath, 'image', $type);
    }

    if ($status) {
        header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        exit;
    } else {
        header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
    }
} 
else if (isset($_REQUEST['action'])) {

    $userId = $_SESSION['userid'];
    $postid = $_REQUEST['post_id'];
    $action = $_REQUEST['action'];
    var_dump($postid);

    if ($action == 'like') {
        $result = postLike($postid);
        if ($result) {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        } else {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        }
    } elseif ($action == 'comment') {

        $comment = $_REQUEST['comment'];
        $result = postComment($postid, $comment);
        if ($result) {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        } else {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        }
    } else if ($action == 'delete_comment') {
        $id = $_REQUEST['comment_id'];
        $result =  deleteComment($id);
        if ($result) {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        } else {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        }
    } else if ($action == 'postdelete') {

        $result = postdelete($postid);
        if ($result) {
            header("Location:../../../View/UserProfile/userprofile.php?id=$userId");
        }
    }
}
}