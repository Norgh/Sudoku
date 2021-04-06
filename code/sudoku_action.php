<!DOCTYPE html>
<!-- Pierre Sénéchal | Augustin Mariage | Judith Lecocq | François Beaucour -->
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<meta charset="utf-8">      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="site.css">
<title> Sudo Gang </title>
<?php
if(isset($_POST['submit']))
{
    $file = fopen('SudokuSolved.txt' ,'w+');

    //chrono

    $file0 = fopen('chrono.txt' ,'r');

    $fin = date("H:i:s") ;

    $h1 = fgets($file0);
    $m1 = fgets($file0);
    $s1 = fgets($file0);

    $h2 = date("H") ;
    $m2 = date("i") ;
    $s2 = date("s") ;

    $count=fopen('counter.txt', 'r');
    $c=fgets($count);
    fclose($count);
    $time2 = ($h2*3600) + ($m2*60) + $s2;
    $time1 = ($h1*3600) + ($m1*60) + $s1;
    $time = $time2 - $time1;
    $time = $time  + (60 * $c);
    $h =  $time / 3600;
    $time %= 3600;
    $m = $time / 60;
    $s = $time % 60;
    $h = floor($h);
    $m = floor($m);

    if (isset($_POST["val"])) 
    {
        $tab=($_POST['val']);
    }
    foreach($tab as $val)
    {
        fwrite($file, $val);
        fwrite($file, "\r\n");
    } 
    fclose($file);
    $file = fopen('State.txt' ,'w+');
    fwrite($file, "1");
    fclose($file);
    exec('Sudoku.exe');
    $file = fopen('Soluce.txt' ,'r');
    $sol = fgets($file);
    $filetime = fopen('time.txt' ,'w+');
	fwrite($filetime, "1");
	fclose($filetime);
    if($sol==1)
    {
		echo ' <div class="container">';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
			echo ' <div class="confetti"></div>';
		echo '</div>';
        echo '<div class="resultat"> Successful level ! </div>';
        echo "<div classe='temps' align='center'> ( Time spent : $h heure(s), $m minute(s) et $s seconde(s) )</div>";
        echo '<embed src="Gang.mp3" width="0" height="0" autostart="true" loop="true" align="left" volume="10%"> </embed>';
        echo '<center><form action="accueil.php"><input type="submit" name="submit" id="back" value="Back"/></form>';
        echo '<form action="scoreboard.php"><input type="submit" name="submit" id="scoreboard" value="Scoreboard"/></form></center>';
        // Conversion en secondes
        $temps = ($h*3600) + ($m*60) + $s;
        $count=fopen('counter.txt', 'r');
        $c=fgets($count);
        fclose($count);
        $temps=$temps+$c*60;
        include("include/session.php");
        $login=$_SESSION['login'];
        $fileLvl = fopen('level.txt' ,'r');
        $level=fgets($fileLvl);
        fclose($fileLvl);
        include("include/connexion.php");
        $requete = "INSERT INTO data (Login, Time, Level) VALUES ('$login', '$temps', '$level')";
        $result = mysqli_query($link,$requete);
    }
    else
    {
        echo '<script language="JavaScript"> alert("Try again, there are errors ! ");window.location.replace("sudoku.php");</script>';
    }
}
if(isset($_POST['help']))
{
    $file = fopen('SudokuHelp.txt' ,'w+');
    $tab=($_POST['val']);

    foreach($tab as $val)
    {
        fwrite($file, $val);
        fwrite($file, "\r\n");
    }
    fclose($file);
    $file = fopen('State.txt' ,'w+');
    fwrite($file, "2");
    fclose($file);
    exec('Sudoku.exe');
    $filetime = fopen('time.txt' ,'w+');
    fwrite($filetime, "0");
    fclose($filetime);
    $count=fopen('counter.txt', 'r');
    $c=fgets($count);
    fclose($count);
    $c++;
    $count=fopen('counter.txt', 'w+');
    fwrite($count, $c);
    fclose($count);
    $file = fopen('help.txt' ,'r');
    $solvable=fgets($file);
    if($solvable==0)
    {
        echo '<script language="JavaScript"> alert("Sudoku is not solvable, you made an error somewhere !");window.location.replace("sudoku.php");</script>';
    }
    if($solvable==1)
    {
        header("location:sudoku.php");
    }
}
?>
