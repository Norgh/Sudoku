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
include("menu.html");
echo "<table border='2' align='center' cellpadding='9' id='tablesudo'></br></br></br>";
echo '<form method="post" action="empty_action.php"><tr>';
$i=1;
$co=0;
echo '<label for="Sudokuname" id="sudoname" > Sudoku name </label> : ';
echo '<input type="text" required="required" maxlength="20" name="sudokuname" id="sudokuname"/>';
while($i<=81)
{
	echo '<td><input type="text" maxlength="1" name="val['.$i.']" id="case"/></td>';
	$i++;
	$co++;
	if($co % 9 == 0)
	{
		echo "</tr><tr>";
	}
}
echo "</table>";
echo '<input type="submit" name="submit" id="submit2" value="Submit"/>
</form>';
?>