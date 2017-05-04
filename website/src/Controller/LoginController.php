<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Login\LoginService;

class LoginController 
{
  /**
   * @var paeschu\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  private $pdo;
  
  /**
   * @param paeschu\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, LoginService $service)
  {
     $this->template = $template;
     $this->loginService = $service;
  }
  
  public function showLogin()
  {
  	echo $this->template->render("login.html.php");	
  }
  
  public function login(array $data)
  {
  	if(!array_key_exists("email", $data) OR !array_key_exists("password", $data))
  	{
  		$this->showLogin();
  		return;
  	}
  	
  	if($this->loginService->authenticate($data["email"], $data["password"]))
  	{
  		header('Location: /');
  	}
  	else
  	{
  		echo $this->template->render("login.html.php", ["email" => $data["email"]]);
  	}
  }
}