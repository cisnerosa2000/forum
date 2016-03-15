<html>
	<head>
		<title>iCadet Forum - Home</title>
		<link href="sitestyle.css" rel="stylesheet">
	</head>
<body>
<div id="main">
	<?php if(!isset($_COOKIE["icadet_username"])) : ?>
		Sign in!<br>
		<form action="signin.php" method="post">
			Username<br>
			<input type="text" name="username" maxlength="32"><br>
			Password:<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Sign In">
		</form>
		<br>Or create an account below, it's easy!
		<form action="signup.php" method="post">
			Username<br>
			<input type="text" name="username" maxlength="32"><br>
			Password:<br>
			<input type="password" name="password"><br>
			<input type="submit" value="Sign Up">
		</form>
	<?php else: ?>
		Welcome back, <?php echo($_COOKIE["icadet_username"]); ?>!
	<?php endif; ?>
</div><br><br>
<div id="sidebar">
	<p><a href="forums.php">Forum Directory</a></p>
	<p><a href="users.php">User Directory</a></p>
	<p><a href="logout.php">Logout</a></p>
	<p><a href="about.html">About</a></p>
</div>
<div id="content">
	<p>Blahblablahcontent</p>
	<p>Blahablahbahb mroe content</p>
		
</div>
</body>
<html>