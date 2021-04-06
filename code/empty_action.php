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
    include("include/session.php");
    $file = fopen('Editor.txt' ,'w+');
    $tab=($_POST['val']);
    foreach($tab as $val)
    {
        fwrite($file, $val);
        fwrite($file, "\r \n");
    } 
    fclose($file);
    
    $file = fopen('State.txt' ,'w+');
    fwrite($file, "3");
    fclose($file);
    exec('Sudoku.exe');
    $file = fopen('EditorState.txt' ,'r');
    $solvable=fgets($file);
    fclose($file);
    if($solvable==0)
    {
        echo '<script language="JavaScript"> alert("Sudoku is not solvable, make another one!");window.location.replace("empty.php");</script>';
    }
    if($solvable==1)
    {
        echo '<form action="accueil.php"><input type="submit" name="submit" id="back2" value="Back"/></form>';
        echo '<form action="scoreboard.php"><input type="submit" name="submit" id="scoreboard2" value="Scoreboard"/></form>';
        echo '<form action="editor.php"><input type="submit" name="submit" id="editor" value="Play my Sudokus"/></form>';
        $login=$_SESSION['login'];
        $name=$_POST['sudokuname'];
        $file=fopen("YourSudoku.txt", "r");
        $sudoku=fgets($file);
        include("include/connexion.php");
        $requete = "INSERT INTO editor (Login, Name, Grid) VALUES ('$login', '$name', '$sudoku')";
        $result = mysqli_query($link,$requete); // Getting the result
    }
?>
