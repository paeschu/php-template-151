<?php

namespace paeschu\Service\Home;

//use paeschu\Service\Home\HomeService;

class HomePdoService implements  HomeService
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function getPosts()
	{
		$stmt = $this->pdo->prepare("SELECT PostID, Title, ImagePath FROM posts");
		$stmt->execute();
			
		if($stmt->rowCount() > 0)
		{
			return $stmt->fetchAll();
		}
		else
		{
			return false;
		}
	}
}