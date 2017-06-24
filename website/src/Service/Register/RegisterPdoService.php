<?php

namespace paeschu\Service\Register;


class RegisterPdoService implements  RegisterService
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function EmailExists($email)
	{
		$stmt = $this->pdo->prepare("SELECT email FROM users WHERE email=?");
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
	
	public function UsernameExists($username)
	{
		$stmt = $this->pdo->prepare("Select username FROM users WHERE username=?");
		$stmt->bindValue(1, $username);
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
	
	public function CreateUser($username, $email, $firstname, $lastname , $password, $securityKey)
	{
		$stmt = $this->pdo->prepare("INSERT INTO users (username, email, firstname, lastname, password) VALUES (?, ?, ?, ?, ?)");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $email);
		$stmt->bindValue(3, $firstname);
		$stmt->bindValue(4, $lastname);
		$stmt->bindValue(5, $password);
		
		if($stmt->execute() && $this->InsertToActivation($email,$securityKey))
		{
			return true;
		}
		else
		{
			return false;	
		}
	}
	
	private function InsertToActivation($email)
	{
		$stmt = $this->pdo->prepare("INSERT INTO activation (UserID, SecurityKey) SELECT UserID FROM users WHERE Email = ?");
		$stmt->bindValue(1, $email);
		$stmt->execute();
		
		if($stmt->rowCount())
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
}