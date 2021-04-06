<!DOCTYPE html>
<!-- Pierre Sénéchal | Augustin Mariage | Judith Lecocq | François Beaucour -->
<html lang="en">
<head>
<meta charset="utf-8">      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="site.css">
<title> Sudo Gang </title>
</head>
<body> 
	
<?php
$i = 1;
include("menu.html");
$fichier = fopen('CodeC/Sudoku/SudokuEmpty.txt' ,'r');
exec("CodeC/Sudoku/Sudoku.exe");
?>
<table border='2' align='center' cellpadding='9' id="table">
<?php
echo "</br></br></br>";
echo "<tr>";
while($i <= 9){
	$ligne = fgets($fichier);
	if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
	
}
echo "</tr>";
echo "<tr>";
while($i <= 18){
	$ligne = fgets($fichier);
	if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 27){
	$ligne = fgets($fichier);
    if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 36){
	$ligne = fgets($fichier);
	if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 45){
	$ligne = fgets($fichier);
	if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 54){
	$ligne = fgets($fichier);
	if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 63){
	$ligne = fgets($fichier);
	if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 72){
	$ligne = fgets($fichier);
    if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
echo "<tr>";
while($i <= 81){
	$ligne = fgets($fichier);
    if($ligne == 0) echo('<td><input type = "text" name = "case" id = "case"/></td>');
    else echo "<td>" . $ligne . "</td>" ;
	$i++;
}
echo "</tr>";
fclose($fichier);

?>
</table>