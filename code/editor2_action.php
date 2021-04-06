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
    if($sol==1)
    {
		echo '</br></br>';
        echo '<div class="resultat"> Successful level ! </div>';
        echo '<embed src="Gang.mp3" width="0" height="0" autostart="true" loop="true" align="left" volume="10%"> </embed>';
		echo '</br></br>';
        echo '<form action="accueil.php"><input type="submit" name="submit" id="back2" value="Back"/></form>';
    }
    else
    {
        echo '<script language="JavaScript"> alert("Try again, there are errors ! ");window.location.replace("editor_action.php");</script>';
    }
}
?>