<?php
namespace paeschu\Controller;

use paeschu\Service\Register\RegisterService;
use paeschu\SimpleTemplateEngine;
class Register
{
	private $template;
	private $service;
	
	public function _construct(SimpleTemplateEngine $template ,RegisterService $service)
	{
		$this->template = $template;
		$this->$service = $service;
	}
	
}