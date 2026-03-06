<?php include "db.php"; ?>

<form method="POST">
<input type="text" name="username" placeholder="Username">
<input type="password" name="password" placeholder="Password">

<button name="register">Register</button>
</form>

<?php

if(isset($_POST['register'])){

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($conn,
"INSERT INTO users(username,password)
VALUES('$username','$password')");

echo "Registration Successful";

}

?>