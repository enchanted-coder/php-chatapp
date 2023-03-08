<?php

$dbhost = $_ENV['DB_HOST'];
$dbuser = $_ENV['DB_USER'];
$dbpass = $_ENV['DB_PASS'];
$dbname = $_ENV['DB_NAME'];

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
	die("failed to connect");
}