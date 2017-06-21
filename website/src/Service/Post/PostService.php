<?php

namespace paeschu\Service\Post;

interface PostService
{
	public function getPost($postId);
	public function createPost($userId,$title,$description,$nameItemOne,$nameItemTwo,$dateTime);
}