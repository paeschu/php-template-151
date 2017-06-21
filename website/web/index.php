<?php
use paeschu\Factory;
use paeschu\Service\Login;

error_reporting(E_ALL);

require_once("../vendor/autoload.php");
$config = parse_ini_file(__DIR__ . "/../config.ini", true);

$factory = new paeschu\Factory($config);
session_start();


switch($_SERVER["REQUEST_URI"]) {
	case "/testroute":
		echo "Test blabla";
		break;
	case "/":
		$factory->getHomeController();
		break;
	case "/createpost":
		//if(isset($_SESSION['userID']))
		//{
			$ctr = $factory->getCreatePostController();
			if($_SERVER["REQUEST_METHOD"] == 'GET')
			{
				$ctr->showCreatePost();
			}
			else
			{
				$ctr->create($_POST);	
			}
		//}
		//else
		//{
			//echo "Melden Sie sich bitte zuerst an!";
		//}
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
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			($factory->getIndexController()->greet($matches[1]));
			break;
		}
		echo "Not Found";
}

