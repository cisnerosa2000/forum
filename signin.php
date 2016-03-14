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

if (mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT password FROM users WHERE username = '${USER}';";
$result = mysqli_query($conn,$query);
if (!$result) {
	die("Failed to access account :(");
}

$options = [
    'cost' => 8,
];
$HASH = password_hash($PASS,PASSWORD_BCRYPT,$options);


if ($result != $HASH) {
	die("Incorrect info: ${HASH}, ${RESULT}, ${query}");
} else {
	$key = "icadet_username";
	setcookie($key,$USER,time() + (86400 * 30),"/");
	mysqli_close($conn);
	exit();
}
mysqli_close($conn);
echo("
<a href='http://localhost/forum/'>Return Home</a>
");
?>