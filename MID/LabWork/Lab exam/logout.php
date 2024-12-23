<?php 

    session_start();
    $_SESSION['users']['flag']=false;
    header('location: login.html');

?>