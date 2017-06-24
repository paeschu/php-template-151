<?php

namespace paeschu\Service\Activation;

interface ActivationService
{
	public function SetActivationCode($userId, $securityKey);
	public function GetActivationCode($userId);
}