<?php
include_once 'dbconnect.php';
//include 'block.php';

$USER = mysqli_real_escape_string($conn,$USER);
$query = "SELECT password FROM users WHERE username = '${USER}';";
$result = mysqli_query($conn,$query);

if (!$result) {
	die("Failed to access account :(");
}

$options = [
    'cost' => 8,
];


$oldpass = mysqli_fetch_assoc($result)['password'];
mysqli_free_result($result);


if (!password_verify($PASS,$oldpass)) {
	echo("
	<html>
	<head>
		<title>Signin</title>
		<link href='sitestyle.css' rel='stylesheet'>
	</head>
	<body>
		<div id='main'><a href='http://localhost/forum/'>Verification failed. Return home?</a></div>
	</body>
	</html>
	");
} else {
	$current_ip = $_SERVER["REMOTE_ADDR"];
	$storeip = "INSERT INTO user_ips (user,ip) VALUES ('${USER}','${current_ip}');";
	$insert_ip = mysqli_query($conn,$storeip);
	
	$key = "icadet_username";
	setcookie($key,$USER,time() + (86400 * 30),"/");
	echo("
	<html>
	<head>
		<title>Signin</title>
		<link href='sitestyle.css' rel='stylesheet'>
	</head>
	<body>
		<div id='main'><a href='http://localhost/forum/'>Verification successfull. Return home?</a></div>
	</body>
	</html>
	");
}
mysqli_close($conn);
?>