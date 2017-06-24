<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Post\PostService;

class PostController
{
	private $template;
	private $postService;

	public function __construct(SimpleTemplateEngine $template, PostService $service)
	{
		$this->template = $template;
		$this->postService = $service;
	}

	public function showPost($postId)
	{		
		$post = $this->postService->getPost($postId);
		
		$comments = $this->postService->getComments($postId);
		echo $this->template->render("post.html.php", ["postArray" => $post[0]], ["commentArray" => $comments[0]]);
	}
	public function addComment($data)
	{
		var_dump($data);
		exit;
		$this->postService->insertComment($data["commentTitle"], $data["commentText"]);
	}

}