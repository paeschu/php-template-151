<html>
	<form method="POST" id="login">
		<input type="email" name="email" placeholder="E-Mail" <?= isset($data["email"]) ? htmlspecialchars($data["email"]) : "" ?> required="required" >
		<input type="password" name="password" placeholder="Passwort" required>
		<input type="submit" name="btnLogin" value="Anmelden">
	</form>
	<p>
	Falls noch &Uuml;ber keinen Account verf&uuml;gen, können Sie sich hier <a href="/register">registrieren</a>!
	</p>
</html>