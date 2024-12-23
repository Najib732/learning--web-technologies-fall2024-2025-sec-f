<?php

if(isset($_POST['submit'])){
 $gender=$_REQUEST['gender'];

 if(!empty($gender)){
    echo "selec successfully";
 }
 else{
    echo "<b>select one option</b>";
 }
}


?>