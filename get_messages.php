<?php
session_start();
include "db.php";

$sender = $_SESSION['user_id'];
$receiver = $_GET['receiver'];

$sql = "SELECT * FROM messages 
WHERE (sender_id='$sender' AND receiver_id='$receiver')
   OR (sender_id='$receiver' AND receiver_id='$sender')
ORDER BY id ASC";

$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){

    if($row['sender_id'] == $sender){
        echo "<div class='msg-sent'>".htmlspecialchars($row['message'])."</div>";
    }else{
        echo "<div class='msg-received'>".htmlspecialchars($row['message'])."</div>";
    }

}
?>