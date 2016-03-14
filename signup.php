<html>
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

$options = [
    'cost' => 8,
];

$USER = mysqli_real_escape_string($conn,$USER);
$HASH = password_hash($pass,PASSWORD_BCRYPT,$options);

$query = "INSERT INTO users (username, password) VALUES ('${USER}','${HASHt}');";
$insert = mysqli_query($conn,$query);

$key = "icadet_username";
setcookie($key,$USER,time() + (86400 * 30),"/");
mysqli_close($conn);
echo("
<a href='http://localhost/forum/'>Return Home</a>
");
?>
<html>