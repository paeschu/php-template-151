<?php

namespace paeschu;
use PDO;

class Factory
{
	private $config;

	public function  __construct(array $config)
	{
		$this->config = $config;
	}
	public function getTemplateEngine()
	{
		return new \paeschu\SimpleTemplateEngine(__DIR__ . "/../templates/");	
	}
	public function getIndexController()
	{
		return new \paeschu\Controller\IndexController(
				$this->getTemplateEngine()
				);
	}
	public  function getPdo()
	{
		return new \PDO
		(
		"mysql:host=mariadb;dbname=app;charset=utf8",
		$this->config["database"]["user"],
		$this->config["database"]["password"],
		[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
		);
	}
	public function getLoginService()
	{
		return new \paeschu\Service\Login\LoginPdoService($this->getPdo());
	}
	
	public function getLoginController() 
	{
		return  new \paeschu\Controller\LoginController($this->getTemplateEngine(), $this->getLoginService());
	}
	
	public function getRegisterService()
	{
		return new \paeschu\Service\Register\RegisterPdoService($this->getTemplateEngine(), $this->$getPdo());	
	}
	
	public function getRegisterController()
	{
		return new \paeschu\Controller\RegisterController($this->getRegisterService());
	}
	
}