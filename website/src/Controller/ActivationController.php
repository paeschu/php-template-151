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
	
	public function Activate($userId,$securityKey)
	{
		$dataBaseSecurityKey = $this->service->CheckSecurtiyKey($userId);
		if($dataBaseSecurityKey == $securityKey)
		{
			$this->service->RemoveActivation($userId);
		}
	}
	
	public function SetNewSecurityKey($email)
	{
		$this->service->UpdateActivationKey($email,$this->NewSecurityKey());
	}
	
	public function NewSecurityKey()
	{
		return rand(10000000,99999999);
	}

}