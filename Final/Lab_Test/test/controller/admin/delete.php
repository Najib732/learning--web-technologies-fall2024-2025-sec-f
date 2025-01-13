<?php
require_once('../../Model/Admin/alluser.php');


    $id = $_REQUEST['id'];  

    $result = drop($id);
    
    if ($result) {
        echo "success";
    } else {
        echo "Error deleting record.";
    }


?>
