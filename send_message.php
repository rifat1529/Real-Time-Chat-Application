<?php

session_start();
include "db.php";

$sender = $_SESSION['user_id'];
$receiver = $_POST['receiver'];
$message = $_POST['message'];

mysqli_query($conn,
"INSERT INTO messages(sender_id,receiver_id,message)
VALUES('$sender','$receiver','$message')");

?>