<?php

<<<<<<< HEAD
require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
=======
use Dotenv\Dotenv;

require __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
>>>>>>> testing
$dotenv->load();

// Figure out the requested page; fallback to the home page.
$page = $_GET['page'] ?? 'Home';

<<<<<<< HEAD
$user_data = check_login($conn);

?>

<html lang="en">
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
=======
// We require the necessary controller class file and call its appropriate method:
if ($page == 'Home') {
	require __DIR__.'/src/controllers/Home.php';
	(new Home())->index();
}
elseif ($page == 'Books/index') {
	require __DIR__.'/src/controllers/Books.php';
	(new Books())->index();
}
elseif ($page == 'Books/detail') {
	require __DIR__.'/src/controllers/Books.php';
	(new Books())->detail();
}
else {
	echo 'NOT FOUND :(';
}
>>>>>>> testing
