<?php

$host = "localhost";
$dbname = "login_db";
$username = "root";
$password = "";

$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->connect_errno){
	die("Connection erro: " . $mysqli->connect_error);
}

return $mysqli;