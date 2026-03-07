<?php
include "db.php";

$registered = false;
$error = "";

if(isset($_POST['register'])){

$username = trim($_POST['username']);
$password = $_POST['password'];

if($username == "" || $password == ""){
$error = "All fields are required";
}else{

$username = mysqli_real_escape_string($conn,$username);
$password = password_hash($password, PASSWORD_DEFAULT);

$image = "default.png";

if(isset($_FILES['profile_image']) && $_FILES['profile_image']['name'] != ""){

$allowed = ['jpg','jpeg','png','gif','webp'];

$filename = $_FILES['profile_image']['name'];
$tmp = $_FILES['profile_image']['tmp_name'];
$size = $_FILES['profile_image']['size'];

$ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

if(!in_array($ext,$allowed)){
$error = "Only JPG, PNG, GIF, WEBP allowed";
}
elseif($size > 2000000){
$error = "Image size must be under 2MB";
}
else{

$newname = "img_".time().".".$ext;

if(move_uploaded_file($tmp,"uploads/".$newname)){
$image = $newname;
}else{
$error = "Image upload failed";
}

}

}

if($error == ""){

$check = mysqli_query($conn,"SELECT id FROM users WHERE username='$username'");

if(mysqli_num_rows($check) > 0){
$error = "Username already exists";
}else{

mysqli_query($conn,
"INSERT INTO users(username,password,profile_image)
VALUES('$username','$password','$image')");

$registered = true;

}

}

}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">

<title>Register</title>

<link rel="stylesheet" href="CSS/style.css">

</head>

<body>

<header class="site-header small">
<div class="container">
<h1 class="brand">Real-Time Chat</h1>
</div>
</header>

<main class="page container page-center">

<section class="card form-card">

<h2>Create Account</h2>

<?php if($error != ""): ?>
<div class="notice" style="background:#ffdede;color:#a00;">
<?php echo $error; ?>
</div>
<?php endif; ?>

<?php if($registered): ?>
<div class="notice">
Registration Successful — <a href="login.php">Login now</a>
</div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data" class="form">

<label class="form-label">
<span>Username</span>
<input type="text" name="username" placeholder="Username" required>
</label>

<label class="form-label">
<span>Password</span>
<input type="password" name="password" placeholder="Password" required>
</label>

<label class="form-label">
<span>Profile Image</span>
<input type="file" name="profile_image" accept="image/*">
</label>

<div class="form-actions">
<button name="register" class="btn">Register</button>
<a class="btn btn-muted inline" href="login.php">Back to Login</a>
</div>

</form>

</section>

</main>

<footer class="site-footer">
<div class="container">
<small>By registering you agree to classroom rules.</small>
</div>
</footer>

</body>

</html>