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
?>