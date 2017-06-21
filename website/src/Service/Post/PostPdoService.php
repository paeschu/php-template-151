<?php

namespace paeschu\Service\Post;

class PostPdoService implements  PostService
{
	/**
	 * @var \PDO
	 */
	private $pdo;

	public function __construct(\PDO $pdo)
	{
		$this->pdo = $pdo;
	}

	public function getPost($postId)
	{
		$stmt = $this->pdo->prepare("SELECT * FROM post WHERE PostID=?");
		$stmt->bindValue(1, $postId);
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
	public function createPost($userId, $title, $description, $dateTime)
	{
		
		$stmt = $this->pdo->prepare("INSERT INTO posts (UserID,Title,Description,DateTime) VALUES (?,?,?,?)");
		$stmt->bindValue(1, $userId);
		$stmt->bindValue(2, $title);
		$stmt->bindValue(3, $description);
		$stmt->bindValue(4, $image);
		$stmt->bindValue(5, $dateTime);
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