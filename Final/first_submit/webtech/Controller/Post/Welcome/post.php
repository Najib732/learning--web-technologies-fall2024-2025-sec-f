<?php
require_once('../../../Model/sql.php'); // Ensure the correct path to the sql.php file

// Function to fetch posts from the database
$result = getPosts();

$data=json_encode($result);
echo $data;

?>
