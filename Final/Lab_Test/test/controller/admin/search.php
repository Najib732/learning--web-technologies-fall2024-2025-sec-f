<?php

require_once('../../Model/Admin/search.php');

$name=$_REQUEST('name');

$result=search($name);

if($result){

    echo json_encode($result);

}



?>