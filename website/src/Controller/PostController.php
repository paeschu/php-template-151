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
		echo $this->template->render("post.html.php", ["postArray" => $post[0]]);
	}

	


}