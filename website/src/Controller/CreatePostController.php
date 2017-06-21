<?php

namespace paeschu\Controller;

use paeschu\SimpleTemplateEngine;
use paeschu\Service\Post\PostService;

class CreatePostController
{
	private $template;
	private $postService;
	private $dateTime;

	public function __construct(SimpleTemplateEngine $template, PostService $service)
	{
		$this->template = $template;
		$this->postService = $service;
	}

	public function showCreatePost()
	{
		echo $this->template->render("createPost.html.php");
	}

	public function create(array $data)
	{
		if
		(
				!array_key_exists("title", $data)
				OR !array_key_exists("descriptionPost", $data)
				OR !array_key_exists("nameItemOne", $data)
				//OR !array_key_exists("imageItemOne", $data)
				OR !array_key_exists("nameItemTwo", $data)
				//OR !array_key_exists("imageItemTwo", $data)
				)
		{
			echo "Bitte f&uuml;llen Sie alle Felder aus.";
			$this->showCreatePost();
			return;
		}
		
		$this->postService->createPost($_SESSION["userID"], $data["title"], $data["descriptionPost"], $data["nameItemOne"], $data["nameItemTwo"], date("Y-m-d H:i:s"));
	}


}