<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
exit();
}

if(!isset($_POST['receiver']) || !isset($_POST['message'])){
exit();
}

$sender = $_SESSION['user_id'];
$receiver = $_POST['receiver'];
$message = $_POST['message'];

mysqli_query($conn,
"INSERT INTO messages(sender_id,receiver_id,message)
VALUES('$sender','$receiver','$message')");
?>