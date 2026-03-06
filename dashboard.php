<?php
session_start();
include "db.php";

$current_user = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT * FROM users WHERE id != $current_user");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Dashboard</title>
  <link rel="stylesheet" href="CSS/style.css" />
</head>
<body>
  <header class="site-header">
    <div class="container">
      <h1 class="brand">Real-Time Chat</h1>
      <nav class="nav">
        <a class="nav-link" href="logout.php">Logout</a>
      </nav>
    </div>
  </header>

  <main class="page container">
    <section class="card">
      <h2>Select User to Chat</h2>

      <div class="users-list">
        <?php while($row = mysqli_fetch_assoc($result)): ?>
          <a class="user-item" href="chat.php?user=<?=$row['id']?>">
            <div class="user-avatar"><?=strtoupper(substr(htmlspecialchars($row['username']),0,1))?></div>
            <div class="user-info">
              <div class="user-name"><?=htmlspecialchars($row['username'])?></div>
            </div>
          </a>
        <?php endwhile; ?>
      </div>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Choose a user to open chat.</small>
    </div>
  </footer>
</body>
</html>