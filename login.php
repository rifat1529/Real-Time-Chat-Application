```php
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

            echo "Wrong Password";

        }

    }else{

        echo "User not found";

    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<body>

<h2>Login</h2>

<form method="POST">

<input type="text" name="username" placeholder="Username" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<button type="submit" name="login">Login</button>

</form>

<br>

<a href="register.php">Create Account</a>

</body>
</html>
```
