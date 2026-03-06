<?php
session_start();
include "db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title>Logout</title>
  <link rel="stylesheet" href="CSS/style.css" />
</head>
<body>
  <header class="site-header small">
    <div class="container">
      <h1 class="brand">Real-Time Chat</h1>
      <nav class="nav">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
      </nav>
    </div>
  </header>

  <main class="page container page-center">
    <section class="card form-card">
      <h2>Log out</h2>
      <p class="muted">To log out, simply close your session from the dashboard or clear session cookies. (This file intentionally keeps original behavior.)</p>

      <a class="btn" href="index.php">Back to Home</a>
    </section>
  </main>

  <footer class="site-footer">
    <div class="container">
      <small>Session utilities.</small>
    </div>
  </footer>
</body>
</html>