<?php 
// Start a new session or continue with the existing one
session_start();
// Checking if session ID doesn't exist already.
if (!isset($_SESSION['login']))
{ 
// You are redirected to the login page as you haven't logged in!
header("location:site.php"); 
} 
?>