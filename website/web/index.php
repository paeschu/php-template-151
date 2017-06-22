<?php
session_start();
use paeschu\Factory;
use paeschu\Service\Login;

error_reporting(E_ALL);
require_once("../web/navigation.php");
require_once("../vendor/autoload.php");
$config = parse_ini_file(__DIR__ . "/../config.ini", true);

$factory = new paeschu\Factory($config);


switch(strtolower(explode("?", $_SERVER["REQUEST_URI"],2)[0])) {
	case "/testroute":
		echo "Test blabla";
		break;
	case "/":
		//$factory->getHomeController();
		$factory->getIndexController();
		break;
	case "/createpost":
		if(isset($_SESSION['email']))
		{
			$ctr = $factory->getCreatePostController();
			if($_SERVER["REQUEST_METHOD"] == 'GET')
			{
				$ctr->showCreatePost();
			}
			else
			{
				$ctr->create($_POST);	
			}
		}
		else
		{
			//echo "Melden Sie sich bitte zuerst an!";
		}
		break;
	case "/login":
		$ctr = $factory->getLoginController();
		if($_SERVER["REQUEST_METHOD"] == 'GET')
		{
			$ctr->showLogin();
		}
		else
		{
			$ctr->login($_POST);
		}
		break;
	case "/logout":
		if(isset($_SESSION['email']))
		{
			
			session_destroy();
		}
	break;
	case "/register":
		$ctr = $factory->getRegisterController();
		if($_SERVER["REQUEST_METHOD"] == 'GET')
		{
			$ctr->showRegister();
		}
		else
		{
			$ctr->register($_POST);
		}
		break;
		case "/post":
			$ctr = $factory->getPostController();
			if(isset($_GET["id"]))
			{
				$ctr->showPost($_GET["id"]);		
			}
			else
			{
				echo "Not Found";
			}

			break;
	default:		
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			($factory->getIndexController()->greet($matches[1]));
			break;
		}
		echo "Not Found";
}
