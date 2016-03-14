<?php
if (isset($_COOKIE['icadet_username'])) {
	unset($_COOKIE['icadet_username']);
	setcookie('icadet_username', '', time() - 3600, '/');
	echo("Success!");
}
?>