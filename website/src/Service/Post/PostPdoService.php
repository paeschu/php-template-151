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
		$stmt = $this->pdo->prepare("SELECT Title,Description,ItemOneName,ItemTwoName FROM posts WHERE postID = ?");
		$stmt->bindValue(1, $postId);
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
	public function createPost($userId, $title, $description,$nameItemOne,$nameItemTwo, $dateTime)
	{
		$stmt = $this->pdo->prepare("INSERT INTO posts(UserID,Title,Description,ItemOneName,ItemTwoName,DateTime) VALUES (?,?,?,?,?,?)");
		$stmt->bindValue(1,$userId);
		$stmt->bindValue(2,$title);
		$stmt->bindValue(3,$description);
		$stmt->bindValue(4,$nameItemOne);
		$stmt->bindValue(5,$nameItemTwo);
		$stmt->bindValue(6,$dateTime);
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
	
	public function getComments($postId)
	{
		$stmt = $this->pdo->prepare("SELECT c.Title, c.Text, u.Username FROM comments c INNER JOIN posts p on c.PostID = p.PostID INNER JOIN users u on c.UserID = u.UserID WHERE p.PostID = ?");
		$stmt->bindValue(1, $postId);
		
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
	public function insertComment($title, $text, $userID, $postID)
	{
		//$stmt = $this->pdo->prepare("INSERT INTO comments ()");
	}
}