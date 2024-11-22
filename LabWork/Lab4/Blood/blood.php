<?php
if(isset($_REQUEST['submit'])){

    $value=$_REQUEST['blood'];

    if($value!=null){
        echo "Your blood group $value added successfully ";

    }
    else{
        echo "Add Your Blood Group";
    }




}


?>