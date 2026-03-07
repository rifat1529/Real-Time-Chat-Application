<?php
session_start();
include "db.php";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) == 1){

        $user = mysqli_fetch_assoc($result);

        if(password_verify($password,$user['password'])){

            /* session store */
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            /* redirect to dashboard */
            header("Location: dashboard.php");
            exit();

        }else{

            $error = "Wrong Password";

        }

    }else{

        $error = "User not found";

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Login</title>
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
      <h2>Login</h2>

      <?php if(!empty($error)): ?>
        <div class="alert"><?=htmlspecialchars($error)?></div>
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
          <button type="submit" name="login" class="btn">Login</button>
          <a class="btn btn-muted inline" href="register.php">Create Account</a>
        </div>
      </form>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>@ Real Time Chat Application.</small>
    </div>
  </footer>
</body>
</html>