<html>
<?php
if ($_POST['username'] && $_POST['password']) {
	$USER = $_POST['username'];
	$PASS = $_POST['password'];
} else {
	die('Incomplete Information');
}

$servername = "192.168.1.11";
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

$query = "INSERT INTO users (username, password) VALUES ('".$USER."','".$HASH."');";
$insert = mysqli_query($conn,$query);
if (!$insert) {
	echo "Failed to create account :(<br>";
} else {
	echo "Successful Account Creation!<br>";
}

$key = "icadet_username";
setcookie($key,$USER,time() + (86400 * 30),"/");
mysqli_close($conn);
?>
<html>