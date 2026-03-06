<?php
session_start();
include "db.php";

$current_user = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE id != $current_user");
?>

<h2>Select User to Chat</h2>

<?php

while($row = mysqli_fetch_assoc($result)){

echo "<p>";
echo "<a href='chat.php?user=".$row['id']."'>";
echo $row['username'];
echo "</a>";
echo "</p>";

}

?>