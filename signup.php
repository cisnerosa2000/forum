<?php
if ($_POST['username'] && $_POST['password']) {
	$USERNAME = $_POST['username'];
	$PASSWORD = $_POST['password'];
	echo($USERNAME);
} else {
	die('Incomplete Information');
}

$servername = "localhost";
$username = "cisnerosa";
$password = "listentothesoundofmyvoice";
$dbname = "forum";

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$options = [
    'cost' => 8,
];
$hash = password_hash($pass,PASSWORD_BCRYPT,$options);

$query = "INSERT INTO users (username, password) VALUES (".$USERNAME.",".$PASSWORD.");";
echo($query);
$insert = mysqli_query($conn,$query);
if (!$insert) {
	echo "Failed to create account :(";
} else {
	echo "Successful Account Creation!"
}
mysqli_close($conn);

?>