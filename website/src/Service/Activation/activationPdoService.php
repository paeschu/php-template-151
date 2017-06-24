<?php

namespace paeschu\Service\Activation;


class ActivationPdoService implements  ActivationService
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}
	
	public function CheckSecurtiyKey($email)
	{
		$stmt = $this->pdo->prepare("SELECT SecurityKey FROM activation WHERE UserID = (SELECT UserID FROM users WHERE Email = ?);");
		$stmt->bindValue(1, $email);
		$stmt->execute();
		
		if($stmt->rowCount() === 1)
		{
			return $stmt->fetchAll();
		}
		else
		{
			return false;
		}
	}

	public function RemoveActivation($email)
	{
		$stmt = $this->pdo->prepare("DELETE FROM activation WHERE UserID = (SELECT UserID FROM users WHERE Email = ?);");
		$stmt->bindValue(1, $email);

		$stmt->execute();
			
		if($stmt->rowCount() > 0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function UpdateActivationKey($email, $securityKey)
	{
		$stmt = $this->pdo->prepare("UPDATE activation SET SecurityKey = ? WHERE UserID = (SELECT UserID FROM users WHERE Email = ?);");
		$stmt->bindValue(1, $securityKey);
		$stmt->bindValue(2, $email);
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