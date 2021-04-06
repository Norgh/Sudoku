<?php
    include('include/session.php'); // Checking if the session is still available
    // Storing user nickname needed in the next SQL request
    $login=$_SESSION['login'];
    $nickname=$_POST['nickname']; // Saving the new login of the user
    include("include/connexion.php"); // Connecting to the database
    $psw=$_POST['password'];
    $password = password_hash($psw, PASSWORD_BCRYPT); // Hashing the new password for more safety
    $requete = "UPDATE user SET `Nickname` ='$nickname', Password ='$password' WHERE Login = '$login'"; // The request to update new informations given by the user
    $result = mysqli_query($link,$requete); // Getting the result
    header("location:userdata.php"); // Redirecting to data page
?>