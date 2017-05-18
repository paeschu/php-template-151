<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Register\RegisterService;

class RegisterController
{
	private $template;
	private $registerService;
	
	public function __construct(SimpleTemplateEngine $template, RegisterService $service)
	{
		$this->template = $template;
		$this->registerService = $service;
	}
	
	public function showRegister()
	{
		echo $this->template->render("register.html.php");
	}
	
	public function register(array $data)
	{
		if
		( 
			!array_key_exists("username", $data) 
			OR !array_key_exists("email", $data) 
			OR !array_key_exists("firstname", $data) 
			OR !array_key_exists("lastname", $data) 
			OR !array_key_exists("password", $data) 
			OR !array_key_exists("passwordAgain", $data)
		)
		{
			echo "Bitte f&uuml;llen Sie alle Felder aus.";
			$this->showRegister();
			return;
		}
		
		if($this->registerService->EmailExists($data["email"]) OR $this->registerService->UsernameExists($data["username"]))
		{
			echo "Benutzername oder Emailadresse existieren schon.";
			$this->showRegister();
			return;
		}
		
		if($data["password"] != $data["passwordAgain"])
		{
			echo "Die Passw&ouml;rter stimmen nicht &uuml;berein.";		
			$this->showRegister();
			return;
		}
			
		$this->registerService->CreateUser($data["username"], $data["email"], $data["firstname"], $data["lastname"], $data["password"]);
		
	}
		
		
}