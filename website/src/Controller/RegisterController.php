<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Register\RegisterService;

class RegisterController
{
	private $template;
	private $registerService;
	private $controller;
	private $mailer;
	
	public function __construct(SimpleTemplateEngine $template, RegisterService $service, ActivationController $controller, \Swift_Mailer $mailer)
	{
		$this->template = $template;
		$this->registerService = $service;
		$this->controller = $controller;
		$this->mailer = $mailer;
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
		$securityKey = $this->controller->NewSecurityKey();
		$this->registerService->CreateUser($data["username"], $data["email"], $data["firstname"], $data["lastname"], $data["password"], $securityKey);
		$this->SendActivationEmail($data["email"], $securityKey);
	}
	
	private function SendActivationEmail($email, $securityKey)
	{
		$message = (new \Swift_Message('Bestaetigung'))
		->setFrom(['kunz.pas@gmail.com' => 'noreply'])
		->setTo([$email])
		->setBody("Oeffnen Sie diesen Link um Ihren Account zu aktivieren https://localhost/activation?account=$email&securityKey=$securityKey");
		$this->mailer->send($message);
	}
		
		
}