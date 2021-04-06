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
include("menu.php");
if(isset($_GET['sudoku']))
{
   $name = $_GET['sudoku']; 
   $login = $_SESSION['login'];
   include("include/connexion.php");
   $requete= "SELECT Grid FROM editor WHERE  Name = '$name' AND Login = '$login'";
   $result = mysqli_query($link,$requete);
   $row = mysqli_fetch_assoc($result);
   $su= $row['Grid'];
   $sudoku=str_split($su);
   $i=0;
   $file=fopen("OwnSudoku.txt", "w+");
   while($i<81)
   {
      $value=$su[$i];
      fwrite($file, $value);
      fwrite($file, "\r\n");
      $i++;
   }
   fclose($file);

   $i=1;
   $co=0;
   $file = fopen('OwnSudoku.txt' ,'r');
   echo "<table border='2' align='center' cellpadding='9' id='tablesudo'></br></br></br>";
   echo '<form method="post" action="editor2_action.php"><tr>';
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
   fclose($file);
   echo "</table>";
   echo '<input type="submit" name="submit" id="submit2" value="Submit"/>
   </form>';
}
/*
else
{
   header('location:accueil.php');
}*/









