<?php

if(isset(["submit"])){

	// grabbing user data
	$uid = $_POST["uid"];
	$pwd = $_POST["pwd"];
	$pwdRepeat = $_POST["pwdrepeat"];
	$email = $_POST["email"];
	
	// Instantiate signup-contr class
	include "../classes/signup.classes.php";
	include "../classes/signup-contr.classes.php";

	$signup = new SignupContr($uid, $pwd, $pwdRepeat, $email);

}