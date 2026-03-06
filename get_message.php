<?php

session_start();
include "db.php";

$sender = $_SESSION['user_id'];
$receiver = $_GET['receiver'];

$result = mysqli_query($conn,
"SELECT * FROM messages
WHERE (sender_id='$sender' AND receiver_id='$receiver')
OR (sender_id='$receiver' AND receiver_id='$sender')
ORDER BY id ASC");

while($row = mysqli_fetch_assoc($result)){

echo "<p>".$row['message']."</p>";

}

?>