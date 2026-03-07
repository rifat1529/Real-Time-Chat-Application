<?php
session_start();
include "db.php";

$id = $_POST['id'];
$user = $_SESSION['user_id'];

$sql = "DELETE FROM messages 
        WHERE id='$id' AND sender_id='$user'";

mysqli_query($conn,$sql);

echo "deleted";
?>