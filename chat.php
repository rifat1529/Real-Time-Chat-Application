<?php
session_start();
include "db.php";

if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

if(!isset($_GET['user'])){
    echo "No user selected";
    exit();
}

$receiver_id = $_GET['user'];
$sender_id = $_SESSION['user_id'];

$result = mysqli_query($conn,"SELECT username FROM users WHERE id='$receiver_id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
<title>Chat</title>

<link rel="stylesheet" href="CSS/style.css">

</head>

<body>

<header class="site-header">
  <div class="container">
    <h1 class="brand">Real-Time Chat</h1>
    <nav class="nav">
      <a class="nav-link" href="dashboard.php">Back</a>
      <a class="nav-link" href="logout.php">Logout</a>
    </nav>
  </div>
</header>

<div class="container page">
  <div class="chat-container">

    <header class="chat-header">
      <div class="chat-header-left">
        <div class="avatar">
          <?php echo strtoupper(substr($user['username'],0,1)); ?>
        </div>
        <div class="chat-title">
          <div class="chat-name">Chat with <?php echo htmlspecialchars($user['username']); ?></div>
          <div class="chat-sub">Connected · Active</div>
        </div>
      </div>
    </header>

    <main id="chat-box" class="chat-box" aria-live="polite" aria-atomic="false">
     
    </main>

    <form class="chat-input" onsubmit="sendMessage(); return false;" aria-label="Send message">
      <input type="text" id="message" placeholder="Type a message..." autocomplete="off" required>
      <button type="submit" class="send-btn">Send</button>
    </form>

  </div>
</div>

<script>
let receiver = <?php echo $receiver_id ?>;
</script>

<script src="Js/chat.js"></script>

</body>
</html>