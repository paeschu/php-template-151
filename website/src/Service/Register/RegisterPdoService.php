<?php

namespace paeschu\Service\Register;

use paeschu\Service\Register\RegisterService;


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
		$stmt = $this->pdo->prepare("SELECT email FROM user WHERE email=?");
		$stmt->bindValue(1, $email);
		$stmt->execute();
			
		if($stmt->rowCount() === 1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	public function UsernameExists($username)
	{
		$stmt = $this->pdo->prepare("Select username FROM user WHERE username=?");
		$stmt->bindValue(1, $username);
		$stmt->execute();
		
		if($stmt->rowCount() === 1)
		{
			return false;
		}
		else
		{
			return true;
		}
	}
	public function CreateUser($username, $firstname, $lastname , $password, $email)
	{
		$stmt = $this->pdo->prepare("INSERT INTO table_name (username, firstname, lastname, email, password) VALUES (?, ?, ?, ?, ?)");
		$stmt->bindValue(1, $username);
		$stmt->bindValue(2, $firstname);
		$stmt->bindValue(2, $lastname);
		$stmt->bindValue(2, $password);
		$stmt->bindValue(2, $email);
		
		if($stmt->execute())
		{
			return true;	
		}
		else
		{
			return false;	
		}
	}
}