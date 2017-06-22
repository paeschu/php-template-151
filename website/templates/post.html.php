<html>
	<head>
   		<title><?= $postArray["Title"] ?></title>
	</head>
	<form method="GET" id="post">
		<h1>
		<?= htmlspecialchars($postArray["Title"]) ?>
		</h1>
		<p>
		<?= htmlspecialchars($postArray["Description"]) ?>
		</p>
		<p>
		<?= htmlspecialchars($postArray["ItemOneName"]) ?>
		<!-- ?= $itemOneImage ?-->
		</p>
		<p>
		<?= htmlspecialchars($postArray["ItemTwoName"]) ?>
		<!-- a href="">
		<img border="0" alt=// $itemTwoName ?> src="  //$ image ?>" width="300" height="300">
		</a-->
		</p>
	</form>
</html>