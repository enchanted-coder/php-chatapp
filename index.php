<?php

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

session_start();
	include("connection.php");
	include("functions.php");

$user_data = check_login($conn);

?>

<html land="en">
	<head>
		<title>ChatR</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="" rel="stylesheet">
	</head>
	<body>

		<button><a href="logout.php">Logout here</a></button>
		<h1>This is the index page.</h1>

		<br>
		Hello, Danny.
	</body>
</html>