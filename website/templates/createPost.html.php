<html>
<head>
	<?php require_once("../web/css/bootstrap.php");?>
</head>
<body>
	<form method="POST" id="post" enctype='multipart/form-data'>
		<p>Titel
			<input type="text" name="title" placeholder="Titel" required="required">
		</p>
		<p>Beschreibung Beitrag:
			<input type="text" name="descriptionPost" placeholder="Beschreibung" required="required">
		</p>
		<p>Name Produkt 1:
			<input type="text" name="nameItemOne" placeholder="Name" required="required">
		</p>

		<p>Name Produkt 2:
			<input type="text" name="nameItemTwo" placeholder="Name" required="required">
		</p>

		<input type="submit" name="btnCreatePost" value="Erstellen">
	</form>
	</body>
</html>