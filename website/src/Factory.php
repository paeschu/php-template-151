<?php

namespace paeschu;

use PDO;

class Factory {
	private $config;
	public function __construct(array $config) {
		$this->config = $config;
	}
	public function getTemplateEngine() {
		return new \paeschu\SimpleTemplateEngine ( __DIR__ . "/../templates/" );
	}
	public function getIndexController() {
		return new \paeschu\Controller\IndexController ( $this->getTemplateEngine () );
	}
	public function getPdo() {
		return new \PDO ( "mysql:host=mariadb;dbname=discussItLite;charset=utf8", $this->config ["database"] ["user"], $this->config ["database"] ["password"], [ 
				PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION 
		] );
	}
	public function getLoginService() {
		return new \paeschu\Service\Login\LoginPdoService ( $this->getPdo () );
	}
	public function getLoginController() {
		return new \paeschu\Controller\LoginController ( $this->getTemplateEngine (), $this->getLoginService () );
	}
	public function getRegisterService() {
		return new \paeschu\Service\Register\RegisterPdoService ( $this->getPdo () );
	}
	public function getRegisterController() {
		return new \paeschu\Controller\RegisterController ( $this->getTemplateEngine (), $this->getRegisterService () );
	}
	public function getHomeService() {
		return new \paeschu\Service\Home\HomePdoService ( $this->getPdo () );
	}
	public function getHomeController() {
		return new \paeschu\Controller\HomeController ( $this->getTemplateEngine (), $this->getHomeService () );
	}
	public function getPostService() {
		return new \paeschu\Service\Post\PostPdoService ( $this->getPdo () );
	}
	public function getPostController(){
		return new \paeschu\Controller\PostController($this->getTemplateEngine(), $this->getPostService());
	}
	public function getCreatePostController() {
		return new \paeschu\Controller\CreatePostController ( $this->getTemplateEngine (), $this->getPostService () );
	}
}