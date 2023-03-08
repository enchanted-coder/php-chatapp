<?php

use Dotenv\Dotenv;

require __DIR__.'/vendor/autoload.php';

$dotenv = Dotenv::createImmutable(__DIR__);
$dotenv->load();

// Figure out the requested page; fallback to the home page.
$page = $_GET['page'] ?? 'Home';

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