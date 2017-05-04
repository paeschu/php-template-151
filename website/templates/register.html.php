<html>
	<form method="POST" id="login">
		<input type="text" name="username" placeholder="Username" required/>
		<input type="text" name="firstname" placeholder="Firstname" required/>
		<input type="text" name="lastname" placeholder="Lastname" required/>
		<input type="password" name="password" required/>
		<input type="password" name="passwordAgain" required/>
		<input type="email" name="email" placeholder="E-Mail" <?= (isset($email)) ? htmlspecialchars($email) : "" ?> required="required"/>
	</form>
</html>