<?php
session_start();
include "db.php";
?>

<form method="POST">

<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">

<button name="login">Login</button>

</form>

<?php

if(isset($_POST['login'])){

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn,
"SELECT * FROM users WHERE username='$username'");

$user = mysqli_fetch_assoc($result);

if(password_verify($password,$user['password'])){

$_SESSION['username']=$username;

header("Location: chat.php");

}else{

echo "Wrong password";

}

}

?>