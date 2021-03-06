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
	
	public function authenticate($email, $password)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM users WHERE email=? AND password=?");
		$stmt->bindValue(1, $email);
		$stmt->bindValue(2, $password);
		$stmt->execute();
		 
		$result = $stmt->fetchAll();
		
		if($stmt->rowCount() === 1)
		{
			$_SESSION["email"] = $email;
			$_SESSION["password"] = $password;
			$_SESSION['userID'] = $result[0]["UserID"];
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function checkActivation($email)
	{
		$stmt = $this->pdo->prepare("SELECT ActivationID FROM activation WHERE UserID = (SELECT UserID FROM users WHERE Email = ?)");
		$stmt->bindValue(1, $email);
		$stmt->execute();
		
		if($stmt->rowCount() === 1)
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
}