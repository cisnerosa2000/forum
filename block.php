<?php
include_once 'dbconnect.php';
$deny_q = 'SELECT * FROM users WHERE blocked = "Y";';
$deny_result = mysqli_query($conn,$deny_q);

$blocked_users = $deny_result['username'];
mysqli_free_result($deny_result);
mysqli_close($conn);
$deny = array();
foreach ($blocked_users as $user) {
	array_push($deny,$user);
}

if (in_array($_SERVER['REMOTE_ADDR'], $deny)) {
   header("location: http://localhost/forum/b&.html");
   exit();
?>