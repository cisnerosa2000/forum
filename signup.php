<html>
<?php
include_once 'dbconnect.php';
//include 'block.php';

$options = [
    'cost' => 8,
];

$USER = mysqli_real_escape_string($conn,$USER);
$HASH = password_hash($PASS,PASSWORD_BCRYPT,$options);

$duplicate_query = "SELECT * FROM users WHERE username = '${USER}';";
$duplicate_result = mysqli_query($conn,$duplicate_query);
$num_rows = mysqli_num_rows($duplicate_result);
if ($num_rows != 0) {
	mysqli_close($conn);
	die("
	<html>
	<head>
		<title>Signup</title>
		<link href='sitestyle.css' rel='stylesheet'>
	</head>
	<body>
		<div id='main'><a href='http://localhost/forum/'>Account creation failed, username is in use. Return Home?</a></div>
	</body>
	</html>
	");
}


$query = "INSERT INTO users (username, password) VALUES ('${USER}','${HASH}');";
$insert = mysqli_query($conn,$query);

$key = "icadet_username";
setcookie($key,$USER,time() + (86400 * 30),"/");

mysqli_free_result($duplicate_result);
mysqli_close($conn);

echo("
<html>
<head>
	<title>Signup</title>
	<link href='sitestyle.css' rel='stylesheet'>
</head>
<body>
	<div id='main'><a href='http://localhost/forum/'>Return Home?</a></div>
</body>
</html>
");
?>
<html>