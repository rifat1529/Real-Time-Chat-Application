<?php include "db.php"; ?>

<?php
$registered = false;
if(isset($_POST['register'])){

$username = $_POST['username'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

mysqli_query($conn,
"INSERT INTO users(username,password)
VALUES('$username','$password')");

$registered = true;

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Register</title>
  <link rel="stylesheet" href="CSS/style.css" />
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

      <?php if($registered): ?>
        <div class="notice">Registration Successful — <a href="login.php">Login now</a></div>
      <?php endif; ?>

      <form method="POST" class="form">
        <label class="form-label">
          <span>Username</span>
          <input type="text" name="username" placeholder="Username" required>
        </label>

        <label class="form-label">
          <span>Password</span>
          <input type="password" name="password" placeholder="Password" required>
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