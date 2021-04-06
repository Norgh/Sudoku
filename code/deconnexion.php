<?php
	unset($_SESSION['login']); // Destroying the Session ID to be sure there's no problem
	session_destroy(); // Shutting down the existing session
	header('location:site.php'); // Redirecting to the login page
?>