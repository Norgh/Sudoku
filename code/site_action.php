<?php
    session_start();
    $log=$_POST['login'];
    $psw=$_POST['password'];
    include("include/connexion.php");
    $requete="SELECT `Login`, `Password` FROM `user` WHERE `Login` = '$log'"; // Preparing the request to verify the password where the login entered is found on the database
    $result = mysqli_query($link, $requete); // Saving the result
    while($row = mysqli_fetch_array($result)) // Searching the right line
    {
        $hashedpsw = $row['Password']; // Saving the hashed password to verify it later
        $_SESSION['login'] = $row['Login']; // Saving the user ID needed later
    }
    if(password_verify($psw, $hashedpsw)) // If the password entered and the hashed version stored in the database are equal when password entered is hashed
    {
        header('Location:Accueil.php'); // Then you are logged in and can go further
    }
    else
    {   
       echo '<script language="JavaScript"> alert("The account entered is incorrect.");window.location.replace("site.php");</script>'; // If not then you are coridally invited to log in again, with the right password this time... Or to put an existing login if that wasn't the case
    }
?>