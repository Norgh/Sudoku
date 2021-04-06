<?php
$link = mysqli_connect("localhost", "root", "" , "sudoku") ; // Setting connection settings to sudoku as it's the name of the database used here

if ($link == false){ // If connection failed then shutting down it.
	echo "Erreur de connexion : " . mysqli_connect_errno() ;
	die();
}