<?php
namespace paeschu\Service\Register;

interface RegisterService
{
	public function EmailExists($email);
	public function UsernameExists($username);
	public function CreateUser($username,$firstname,$lastname,$password,$email,$securityKey);
}