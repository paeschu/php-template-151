<?php

namespace paeschu\Service\Login;

class LoginPdoService implements  LoginService
{
	/**
	 * @var \PDO
	 */
	private $pdo;
	
	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function authenticate($username, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=? AND password=?");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $password);
		$stmt->execute();
		 
		if($stmt->rowCount() === 1)
		{
			$_SESSION["email"] = $username;
			return true;
		}
		else
		{
			return false;
		}
	}
}