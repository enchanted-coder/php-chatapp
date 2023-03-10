<?php

session_start();

if(isset($_SESSION["user_id"])) {

	$mysqli = require __DIR__ . "/database.php";

	$sql = "SELECT * FROM user
			WHERE id = {$_SESSION["user_id"]}";

	$result = $mysqli->query($sql);

	$user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Home</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="icon" type="image/x-icon" href="./assets/chat-bubbles.png">
    <link href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" rel="stylesheet">
  </head>
  <body>
		<h1>Home</h1>
    
    <div class ="icon" style="width:50px; height:50px; margin-right:100px; margin-left:0;" >
      <img src="./assets/chat-bubbles.png" alt="flatart_icons">
    </div>
		<?php if (isset($user)): ?>

			<p>Hello <?= htmlspecialchars($user["name"])?></p>

			<p><a href="logout.php">Log out</a></p>

		<?php else: ?>

			<p><a href="login.php">Log in</a> or <a href="signup.html">Sign up</a></p>

		<?php endif; ?>
  
  
  </body>
</html>
