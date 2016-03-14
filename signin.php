<?php
if ($_POST['username'] && $_POST['password']) {
	$USER = $_POST['username'];
	$PASS = $_POST['password'];
} else {
	die('Incomplete Information');
}
$servername = "172.25.51.194";
$username = "cisnerosa";
$password = "listentothesoundofmyvoice";
$dbname = "forum";

$conn = mysqli_connect($servername,$username,$password,$dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$pwd_q = "SELECT password FROM users WHERE username = '".$USER."' ";
$result = mysqli_query($conn,$pwd_q);

if (!$result) {
	die("Failed to access account :(<br>");
}

$options = [
    'cost' => 8,
];
$USER = mysqli_real_escape_string($conn,$USER);
$HASH = password_hash($PASS,PASSWORD_BCRYPT,$options);
echo($result);

if ($result != $HASH) {
	die("Incorrect info.");
} else {
	$key = "icadet_username";
	setcookie($key,$USER,time() + (86400 * 30),"/");
	mysqli_close($conn);
	header("Location: http://localhost/forum");
	exit();
}
mysqli_close($conn);
?>