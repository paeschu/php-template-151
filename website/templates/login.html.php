<html>
	<form method="POST" id="login">
		<input type="email" name="email" placeholder="E-Mail" <?= isset($data["email"]) ? htmlspecialchars($data["email"]) : "" ?> required="required" >
		<input type="password" name="password" placeholder="Passwort" required>
		<input type="submit" name="btnLogin" value="Anmelden">
	</form>
</html>