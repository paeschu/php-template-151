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
	
	public function SetActivationCode($userId, $securityKey)
	{
		$stmt = $this->pdo->prepare("INSERT INTO activation (SecurityKey) VALUES (?) WHERE ActivationID = ?");
		$stmt->bindValue(1, $securityKey);
		$stmt->bindValue(2, $ActivationId);
				
		if($stmt->execute())
		{
			return true;
		}
		else
		{
			return false;
		}
		
	}
	public function GetActivationCode($userId)
	{
		$stmt = $this->pdo->prepare("SELECT SecurityKey FROM activations WHERE UserID = ?");
		$stmt->bindValue(1, $userId);
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

}