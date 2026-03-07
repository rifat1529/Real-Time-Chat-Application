<?php
session_start();
include "db.php";

$id = $_POST['id'];
$message = $_POST['message'];
$user = $_SESSION['user_id'];

mysqli_query($conn,"UPDATE messages 
SET message='$message' 
WHERE id='$id' AND sender_id='$user'");
?>