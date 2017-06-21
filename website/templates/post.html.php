<html>
	<head>
   		<title><?= $title ?></title>
	</head>
	<form method="GET" id="post">
		<h1>
		<?= $title ?>
		</h1>
		<p>
		<?= $description ?>
		</p>
		<p>
		<?= $itemOneName ?>
		<?= $itemOneImage ?>
		</p>
		<p>
		<?= $itemTwoName ?>
		<a href="">
		<img border="0" alt=<?= $itemTwoName ?> src="<?= $image ?>" width="300" height="300">
		</a>
		</p>
	</form>
</html>