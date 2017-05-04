<?php

namespace paeschu\Service\Login;

interface LoginService
{
	public function authenticate($username, $password);	
}