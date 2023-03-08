<?php

$dbhost = "";// use dotenv
$dbuser = "";// use dotenv
$dbpass = "";// use dotenv
$dbname = "";// use dotenv

if(!$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname)){
	die("failed to connect");
}