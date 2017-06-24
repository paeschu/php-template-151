<html>
	<head>
		<?php require_once("../web/css/bootstrap.php");?>
	</head>
	<body>
		<form method="POST" id="register">
			<p>Benutzername
				<input type="text" name="username" placeholder="Benutzername" required="required">
			</p>
			<p>E-Mail:
				<input type="email" name="email" placeholder="E-Mail" <?= (isset($email)) ? htmlspecialchars($email) : "" ?> required="required">
			</p>
			<p>Vorname:
				<input type="text" name="firstname" placeholder="Vorname" required="required">
			</p>
			<p>Nachname:
				<input type="text" name="lastname" placeholder="Nachname" required="required">
			</p>
			<p>Passwort:
				<input type="password" name="password" required="required">
			</p>
			<p>Passwort Wiederholen:
				<input type="password" name="passwordAgain" required="required">
			</p>
			<input type="submit" name="btnRegistrieren" value="Registrieren">
		</form>
	</body>
</html>