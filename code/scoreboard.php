<!DOCTYPE html>
<!-- Pierre Sénéchal | Augustin Mariage | Judith Lecocq | François Beaucour -->
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="utf-8">      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="scoreboard.css">
<title> Sudo Gang </title>

<?php
include("menu.php");
?>


<!-- 1er tableau -->


</br></br></br>
<div id="titre1">Beginner Level </div>
<table id="classement1" border='1' align='center' cellpadding='5' >
<tr>
<th>Rank</th>
<th>Login</th>
<th>Time</th>
</tr>

<?php /* Extraction des résultats de la requete SELECT */

 include("include/connexion.php");
 $requete= "SELECT Login, Time, Level FROM data WHERE  Level = 'Beginner' ORDER BY Time ";
$result = mysqli_query($link,$requete);
$i=1;
/* constrution des lignes dynamiquement */
while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr>";
	echo "<td id='colonne'>" . $i . "</td>" ;
    echo "<td id='colonne'>" . $row["Login"] . "</td>" ;
    echo "<td id='colonne'>" . $row["Time"] . "</td>" ;
    echo "</tr >";
	$i++;
}

?>
</table>

<!-- 2e tableau -->

<div id="titre2">Medium Level </div>
<table id="classement2" border='1' align='center' cellpadding='5' >
<tr>
<th>Rank</th>
<th>Login</th>
<th>Time</th>
</tr>

<?php /* Extraction des résultats de la requete SELECT */

 include("include/connexion.php");
 $requete= "SELECT Login, Time, Level FROM data WHERE  Level = 'Medium' ORDER BY Time ";
$result = mysqli_query($link,$requete);
$i=1;
/* constrution des lignes dynamiquement */
while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr>";
	echo "<td id='colonne'>" . $i . "</td>" ;
    echo "<td id='colonne'>" . $row["Login"] . "</td>" ;
    echo "<td id='colonne'>" . $row["Time"] . "</td>" ;
	echo "</tr >";
	$i++;
}

?>
</table>

<!-- 3e tableau -->

<div id="titre3"> Expert Level </div>
<table id="classement3" border='1' align='center' cellpadding='5' >
<tr>
<th>Rank</th>
<th>Login</th>
<th>Time</th>
</tr>

<?php /* Extraction des résultats de la requete SELECT */

 include("include/connexion.php");
 $requete= "SELECT Login, Time, Level FROM data WHERE  Level = 'Expert' ORDER BY Time ";
$result = mysqli_query($link,$requete);
$i=1;
/* constrution des lignes dynamiquement */
while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr>";
	echo "<td id='colonne'>" . $i . "</td>" ;
    echo "<td id='colonne'>" . $row["Login"] . "</td>" ;
    echo "<td id='colonne'>" . $row["Time"] . "</td>" ;
    echo "</tr >";
	$i++;
}

?>
</table>