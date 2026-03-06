```php
<?php
session_start();
include "db.php";

/* login check */
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit();
}

/* user select check */
if(!isset($_GET['user'])){
    echo "No user selected";
    exit();
}

$receiver_id = $_GET['user'];
$sender_id = $_SESSION['user_id'];

/* receiver info */
$result = mysqli_query($conn,"SELECT username FROM users WHERE id='$receiver_id'");
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Chat</title>

<style>

body{
font-family: Arial;
background:#f0f2f5;
}

.chat-container{
width:500px;
margin:40px auto;
background:white;
border-radius:10px;
box-shadow:0 0 10px rgba(0,0,0,0.1);
}

.chat-header{
padding:15px;
background:#0084ff;
color:white;
font-size:18px;
}

#chat-box{
height:300px;
overflow-y:auto;
padding:10px;
border-bottom:1px solid #ddd;
}

.chat-input{
display:flex;
padding:10px;
}

.chat-input input{
flex:1;
padding:10px;
border:1px solid #ccc;
border-radius:5px;
}

.chat-input button{
padding:10px 20px;
margin-left:10px;
background:#0084ff;
color:white;
border:none;
border-radius:5px;
cursor:pointer;
}

</style>

</head>

<body>

<div class="chat-container">

<div class="chat-header">
Chat with <?php echo $user['username']; ?>
</div>

<div id="chat-box"></div>

<div class="chat-input">
<input type="text" id="message" placeholder="Type message...">
<button onclick="sendMessage()">Send</button>
</div>

</div>

<script>

let receiver = <?php echo $receiver_id ?>;

</script>

<script src="js/chat.js"></script>

</body>
</html>
```
