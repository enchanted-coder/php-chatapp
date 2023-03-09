<?php

class SignupContr{

	private $uid;
	private $pwd;
	private $pdwRepeat;
	private $email;

	public function __construct($uid, $pdw, $pdwRepeat, $email){
		$this->uid=$uid;
		$this->pwd=$$pwd;
		$this->pwdRepeat = $pwdRepeat;
		$this->email = $email;
	}

}