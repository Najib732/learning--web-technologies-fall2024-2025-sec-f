<?php
require_once('../../Model/Admin/alluser.php');


$name = $_REQUEST['name'];
$contact_no = $_REQUEST['contact'];
$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$id = $_REQUEST['id'];

$result = Update($name, $contact_no, $username, $password,$id);

if ($result) {
    echo "sucessfull";
}
