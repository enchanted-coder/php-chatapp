<?php

$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST"){

	$mysqli = require __DIR__ . "/database.php";

	$sql = sprintf("SELECT * FROM users WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));

	$result = $mysqli->query($sql);

	$user = $result->fetch_assoc();

	// if record of email is found in database
	if($user){
		if(password_verify($_POST["password"], $user["password_hash"])){

			session_start();

			session_regenerate_id();

			$_SESSION["user_id"] = $user["id"];
			header("Location: index.php");
			exit;
		}
	}

	$is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/x-icon" href="./assets/chat-bubbles.png">
    <link href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" rel="stylesheet">
  </head>
  <body>

    <div class ="icon" style="width:50px; height:50px; margin-right:100px; margin-left:0;" >
      <img src="./assets/chat-bubbles.png" alt="flatart_icons">
    </div>
		<h1>Login</h1>
		

		<?php if($is_invalid): ?>
			<em style="color: red;" >Invalid login</em>
		<?php endif; ?>

		<form method="post">
			<label for="email">email</label>
			<input type="email" name="email" id="email" value="<?= htmlspecialchars($_POST["email"] ?? "") ?>" >
			<label for="password">Password</label>
			<input type="password" name="password" id="password">

      <button>Log in</button>

      <p>New user? <a href="signup.html">Sign up here</a></p>
		</form>
  </body>
</html>
