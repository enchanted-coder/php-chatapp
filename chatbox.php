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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/x-icon" href="./assets/chat-bubbles.png">
    <link href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css" rel="stylesheet">
	
    <title>chat.chatr</title>
</head>

<body onload="show_func()">
<div id="container">
	<main>
		<header>
			<div>
				<h2>CHATBOX</h2>
				<p>You are logged in as: <?= htmlspecialchars($user["username"])?></p>
			</div>
		</header>



<form id="myform" action="Group_chat.php" method="POST" >
<div class="inner_div" id="chathist">


</body>
</html>

