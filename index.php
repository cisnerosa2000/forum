<html>
	<head>
		<title>iCadet Forum - Home</title>
	</head>
<body>
	
	<?php if(!isset($_COOKIE["icadet_username"])) : ?>
		Sign in!<br>
		<form action="signin.php" method="post">
			Username<br>
			<input type="text" name="username"><br>
			Password:<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Sign In">
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
	<p>Forum Directory</p>
	<p>User Directory</p>
	<p>Mailbox</p>
	<p><a href="logout.php">Logout</a></p>
	<p>About</p>
</body>
<html>