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
	
	public function Activate($email,$securityKey)
	{
		$dataBaseSecurityKey = $this->service->CheckSecurtiyKey($email);
		if($dataBaseSecurityKey[0]["SecurityKey"] == $securityKey)
		{
			$this->service->RemoveActivation($email);
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