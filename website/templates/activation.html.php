<html>
<head>
<?php require_once("../web/css/bootstrap.php");?>
</head>
<body>
<p>
	<?= $email ?>
	Sie müssen zuerst ihren Account aktiviern.
	Falls sie die Email nicht bekommen haben können sie es <a href="/activation?account=<?= $email ?>">hier</a> erneut schicken!
</p>
</body>
</html>