<html>	
	<head>
	<?php require_once("../web/css/bootstrap.php");?>
   		<title><?= $postArray["Title"] ?></title>
	</head>
	<body>
	<fieldset>
		<h1 class="title">
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
	</fieldset>
	<fieldset>
		<h3>Kommentiern</h3>
		<form method="POST" id="comment">
			<input type="text" name="commentTitle" placeholder="Titel"required="required" /><br>
			<input type="text" name="commentText" placeholder="Kommentar" required="required"/><br>
			<input type="submit" name="btnComment" value="Kommentieren"/>
		</form>
	</fieldset>
	<fieldset>
		<h3>
			Kommentare
		</h3>
		<?php 
			//foreach ()
		?>
	</fieldset>
	</body>
</html>