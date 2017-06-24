<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Activation\ActivationService;

class ActivationController
{
	private $template;
	private $service;

	public function __construct(SimpleTemplateEngine $template, ActivationService $service)
	{
		$this->template = $template;
		$this->service = $service;
	}

	public function SetSecurityKey($userId)
	{
		$securityKey = rand(8,8);
		$this->service->SetActivationCode($userId, $securityKey);
	}
}