<html>
	<head>
		<title>iCadet Forum - Home</title>
	</head>
	<?php if(!isset($_COOKIE["icadet_username"])) : ?>
		Sign in!<br><br>
		<form action="signin.php" method="post">
			Username<br>
			<input type="text" name="username"><br>
			Password:<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Sign Up">
		</form>
		<br>Or create an account below, it's easy!
		<form action="signup.php" method="post">
			Username<br>
			<input type="text" name="username"><br>
			Password:<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Sign Up">
		</form>
	<?php else: ?>
		Welcome back, <?php echo($_COOKIE["icadet_username"]); ?>!
	<?php endif; ?>
<html>

