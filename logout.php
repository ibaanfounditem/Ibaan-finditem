<?php
	session_start();
	session_destroy();
		unset($_SESSION['adminLogin']);
		header("Location: admin_login.php");
		exit();
?>