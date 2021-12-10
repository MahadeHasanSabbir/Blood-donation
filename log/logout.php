<?php
	session_start();
	session_destroy();
	header("location:http://localhost/blood-donation/log/login.php");
?>
