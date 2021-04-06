<?php
    $nickname=$_POST['nickname']; 
    $login=$_POST['login'];
    $psw=$_POST['password']; // Taking out of the form these variables to store them into the database.
    $password = password_hash($psw, PASSWORD_BCRYPT); // Hashing the password for more safety
    include("include/connexion.php"); // Connecting to the database
    $requete = "SELECT `Login` FROM `user` Where `Login`= '$login'"; // The request to see if this login doesn't exist already
    $result = mysqli_query($link,$requete); // Applying the request
    $exist = mysqli_num_rows($result); // If the login doesn't exist already then $exist=0 if it exists already then exist= 1
    if($exist==1) // If the login is already taken by someone in the database
    {
        echo '<script language="JavaScript"> alert("The username entered has already been used, please change it.");window.location.replace("inscription.php");</script>'; // Please chose another login
    }
    else // If that's not the case then all's good you can use it, and enjoy doing Sudoku! (after you log in of course)
    {
        $requete = "INSERT INTO user (Nickname, Login, Password) VALUES ('$nickname', '$login', '$password')"; // So we create your account in our database
        $result = mysqli_query($link,$requete); // the request itself 
        header("location:site.php"); // Now you are to login...
    }
?>