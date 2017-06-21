<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Home\HomeService;

class LoginController {
	/**
	 *
	 * @var paeschu\SimpleTemplateEngine Template engines to render output
	 */
	private $template;
	private $homeService;

	/**
	 *
	 * @param
	 *        	paeschu\SimpleTemplateEngine
	 */
	public function __construct(SimpleTemplateEngine $template, HomeService $service) {
		$this->template = $template;
		$this->homeService = $service;
	}
	public function showHome() {
		echo $this->template->render ( "home.html.php", ["name" => $name]);
	}
	
	
}