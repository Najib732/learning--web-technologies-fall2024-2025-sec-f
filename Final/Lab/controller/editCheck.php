<?php
session_start();
require_once('../model/userModel.php');

if(isset($_REQUEST['submit'])){
$name=$_REQUEST['name'];
$password=$_REQUEST['password'];
$email=$_REQUEST['email'];
$id=$_REQUEST['id'];

if(updateUser($name,$password,$email,$id)){
    echo "Data Update Successfully ";
}

else{

}

}

else{

}




?>