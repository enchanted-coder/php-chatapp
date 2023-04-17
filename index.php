<?php

session_start();

if(isset($_SESSION["user_id"])) {

	$mysqli = require __DIR__ . "/database.php";

	$sql = "SELECT * FROM users
			WHERE id = {$_SESSION["user_id"]}";

	$result = $mysqli->query($sql);

	$user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/x-icon" href="./assets/chat-bubbles.png">
    <link href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" rel="stylesheet">
    <title>Chat</title>
    <style>
      /* Dark mode */
      body {
        margin: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        background-color: #222;
        color: #fff;
      }

      #messages {
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow-y: scroll;
        height: 300px;
        border: 1px solid #444;
        border-radius: 5px;
        background-color: #333;
      }

      #messages li {
        margin: 5px;
        padding: 10px;
        background-color: #333;
        border-radius: 5px;
      }

      #messages li:nth-child(odd) {
        background-color: #444;
      }

      form {
        display: flex;
        margin: 10px;
      }

      input[type="text"] {
        flex-grow: 1;
        margin-right: 10px;
        padding: 10px;
        border: none;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(255, 255, 255, 0.1);
        background-color: #444;
        color: #fff;
      }

      button {
        padding: 10px;
        border: none;
        border-radius: 5px;
        background-color: #007bff;
        color: #fff;
        cursor: pointer;
      }

      button:hover {
        background-color: #0062cc;
      }
    </style>
  </head>
  <body>
  <div class ="icon" style="width:50px; height:50px; margin-right:100px; margin-left:0;" >
      <img src="./assets/chat-bubbles.png" alt="flatart_icons">
    </div>
    <?php if (isset($user)): ?>

<p>Logged on: <?= htmlspecialchars($user["username"])?></p>
<ul id="messages"></ul>
    <form id="chat-dialog-form">
      <div>
      <input id="chat-dialog-input" type="text" autocomplete="off" autofocus>
    </div>
      <button>Send</button>
    </form>

<p><a href="logout.php">Log out</a></p>

<?php else: ?>

<p><a href="login.php">Log in</a> or <a href="signup.html">Sign up</a></p>

<?php endif; ?>

    
    <script src="main.js"></script>
    
  </body>
</html>

