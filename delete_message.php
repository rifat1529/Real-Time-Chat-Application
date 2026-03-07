<?php
session_start();
include "db.php";

$id = $_POST['id'];
$user = $_SESSION['user_id'];

mysqli_query($conn,"DELETE FROM messages WHERE id='$id' AND sender_id='$user'");
?>