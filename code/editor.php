  <!DOCTYPE html>
<!-- Pierre Sénéchal | Augustin Mariage | Judith Lecocq | François Beaucour -->
<html lang="en">
<head>
<meta charset="utf-8">      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="site.css">
<link rel="stylesheet" href="scoreboard.css">
<title> Sudo Gang </title>
<style>
#imgtourne {
border-radius: 100px;
margin-left: 0px;
-webkit-animation:spin 1s linear infinite;
-moz-animation:spin 8s linear infinite;
animation:spin 8s linear infinite;
}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }

#imgtourne1 {
border-radius: 100px;
margin-left: 0px;
-webkit-animation:spin 1s linear infinite;
-moz-animation:spin 2s linear infinite;
animation:spin 2s linear infinite;
}
@-moz-keyframes spin { 100% { -moz-transform: rotate(360deg); } }
@-webkit-keyframes spin { 100% { -webkit-transform: rotate(360deg); } }
@keyframes spin { 100% { -webkit-transform: rotate(360deg); transform:rotate(360deg); } }
</style>
</head>
<body> 


<?php
include("menu.php");
?>
</br></br></br></br></br></br>
<div id="titre4"> Mes sudokus : </div>
<table id="classement4" border='1' align='center' cellpadding='5' >
<tr>
<th>Name</th>
</tr>

<?php /* Extraction des résultats de la requete SELECT */
$login = $_SESSION['login'];
include("include/connexion.php");
$requete= "SELECT Login, Name, Grid FROM editor WHERE  Login = '$login' ORDER BY Name ";
$result = mysqli_query($link,$requete);
/* constrution des lignes dynamiquement */
echo '<form method="post" action="editor_action.php">';
while ($row = mysqli_fetch_assoc($result))
{
	echo "<tr>";
    echo '<td id="colonne" onClick=javascript:document.location.href="editor_action.php?sudoku='.$row["Name"].'">'.$row["Name"].'</td>';
    echo "</tr >";
}
echo '</form>';
?>
</table>
</div>
<div class="Rules2">
				<h4>Rules reminder</h4>
				<div class="hiddentext"><p>Each of the nine blocks has to contain all the numbers 1-9 within its squares.</br> Each number can only appear once in a row, column or box. The difficulty lies in that each vertical nine-square column, or horizontal nine-square line across, within the larger square, must also contain the numbers 1-9, without repetition or omission.</br> To complete a cell, just click on it and use your keyboard. Good luck!</p></div>
</div>



