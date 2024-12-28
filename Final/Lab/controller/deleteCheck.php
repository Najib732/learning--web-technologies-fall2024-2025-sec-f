<?php
require_once('../model/userModel.php');
session_start();


if (isset($_REQUEST['id'])) {
    
    if(deleteUser($_REQUEST['id'])){
            echo "successfully delete";
    }
    else{
            echo "there is some problem ";
    }
}






?>