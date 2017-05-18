<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Login\LoginService;

class LoginController {
	/**
	 *
	 * @var paeschu\SimpleTemplateEngine Template engines to render output
	 */
	private $template;
	private $loginService;
	
	/**
	 *
	 * @param
	 *        	paeschu\SimpleTemplateEngine
	 */
	public function __construct(SimpleTemplateEngine $template, LoginService $service) {
		$this->template = $template;
		$this->loginService = $service;
	}
	public function showLogin() {
		echo $this->template->render ( "login.html.php" );
	}
	public function login(array $data) {
		if (! array_key_exists ( "email", $data ) or ! array_key_exists ( "password", $data )) {
			echo "Bitte f&uuml;llen Sie alle Felder aus.";
			$this->showLogin ();
			return;
		}
		
		if ($this->loginService->authenticate ( $data ["email"], $data ["password"] )) {
			
		} else {
			echo "Falsches Passwort oder falsche E-Mailadresse.";
			echo $this->template->render ( "login.html.php", [ 
					"email" => $data["email"] 
			] );
		}
	}
}