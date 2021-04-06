 <!DOCTYPE html>
<!-- Pierre Sénéchal | Augustin Mariage | Judith Lecocq | François Beaucour -->
<html lang="en">
<head>
<meta charset="utf-8">      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="site.css">
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
$i = 1;
$co = 0; 
include("menu.php");
echo '<div class="ajustements">';
include("ajoutsudoku.php");
echo '</div>';
if(isset($_GET['level']))
{
	$filetime = fopen('time.txt' ,'w+');
	fwrite($filetime, "1");
	fclose($filetime);
	$lvl = $_GET['level']; 
	$file = fopen('arg.txt' ,'w+');
	if($lvl=="B")
	{
		fwrite($file, "5");
		$fileLvl = fopen('level.txt' ,'w+');
		fwrite($fileLvl, "Beginner");
		fclose($fileLvl);
	}
	if($lvl=="M")
	{
		fwrite($file, "25");
		$fileLvl = fopen('level.txt' ,'w+');
		fwrite($fileLvl, "Medium");
		fclose($fileLvl);
	}
	if($lvl=="E")
	{
		fwrite($file, "50");
		$fileLvl = fopen('level.txt' ,'w+');
		fwrite($fileLvl, "Expert");
		fclose($fileLvl);
	}
	fclose($file);
	$file = fopen('State.txt' ,'w+');
	fwrite($file, "0");
	fclose($file);
	exec('Sudoku.exe');
}
$filetime = fopen('time.txt' ,'r');
$chrono=fgets($filetime);
if($chrono==1)
{
	//chrono
	$h1 = date("H") ;
	$m1 = date("i") ;
	$s1 = date("s") ;
	$file0 = fopen('chrono.txt' ,'w+');
	fwrite($file0, $h1);
	fwrite($file0,"\r\n");
	fwrite($file0, $m1);
	fwrite($file0,"\r\n");
	fwrite($file0, $s1);
	fclose($file0);
	$count=fopen('counter.txt', 'w+');
    fwrite($count, "0");
    fclose($count);
}
fclose($filetime);
$file = fopen('SudokuEmpty.txt' ,'r');
echo '<div class="premierplan">';
echo "<table border='2' align='center' cellpadding='9' id='tablesudo'></br></br></br>";
echo '<form method="post" action="sudoku_action.php"><tr>';
echo '<div align="right"><input type="submit" name="help" id="helpbutton" value="Help?"/></div>';
echo '<div class="grillesudo">';
while($i<=81)
{
	$li = fgets($file);
	if($li == 0)
	{
		echo '<td><input type="text" maxlength="1" name="val['.$i.']" id="case"/></td>';
	}
	else
	{
		echo '<td><input type="text" readonly="readonly" name="val['.$i.']" id="case" value="'.$li.'"/></td>';
	}
	$i++;
	$co++;
	if($co % 9 == 0)
	{
		echo "</tr><tr>";
	}
}
echo "</table>";
echo '<center><input type="submit" name="submit" id="submit" value="Submit"/></center>
</form>';
fclose($file);
echo '</div>';
?>
</div>
<div class="Rules2">
				<h4>Rules reminder</h4>
				<div class="hiddentext"><p>Each of the nine blocks has to contain all the numbers 1-9 within its squares.</br> Each number can only appear once in a row, column or box. The difficulty lies in that each vertical nine-square column, or horizontal nine-square line across, within the larger square, must also contain the numbers 1-9, without repetition or omission.</br> To complete a cell, just click on it and use your keyboard. Good luck!</p></div>
</div>