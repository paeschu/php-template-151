<?php

namespace paeschu\Service\Activation;

interface ActivationService
{
	public function CheckSecurtiyKey($email);
	public function UpdateActivationKey($email, $securityKey);
	public function RemoveActivation($email);
}