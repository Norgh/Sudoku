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
</head>
<body> 
<div class="Accueil">
	<div class="rectangleTitre">
		<div class="TitreAccueil"> 
			<h1> SUDO'GANG </h1> 
		</div>
	</div>
	<div class="Profil">
		<?php 
		include('include/session.php'); // Checking the session
        $login = $_SESSION['login']; // We need the user's ID to find their identifiants in the database
		echo '<p><center> 	Hi '.$login.' </center></p>' ;
		echo "<center> <div class='modifprofil' style='background: #C8C8C8; opacity: 60%; cursor: pointer;'><a href='userdata.php'> Modify my profil </a></div></center>";
		?>
	</div>
	<div class="choose"> <p> Choose your level : </p> </div>
	<form method="post" action="sudoku.php"><tr>
		<div class="menu1" onclick='location.href="sudoku.php?level=B";'> Beginner level </div>
		<div class="menu2" onclick='location.href="sudoku.php?level=M";'> Medium level </div>
		<div class="menu3" onclick='location.href="sudoku.php?level=E";'> Expert level </div>
		<div class="menu4" onclick='location.href="editor.php";'> Editor </div>
	</form>

</div>
</br>
<img src="logo.png" class="logoimg" >
</br></br></br>
<div class="Règles"> <h3>The Rules :</h3> </div>
<div class="rectangle"></div>
<div class ="text"> The classic Sudoku game involves a grid of 81 squares. The grid is divided into nine blocks, each containing nine squares. The rules of the game are simple: each of the nine blocks has to contain all the numbers 1-9 within its squares.</br> Each number can only appear once in a row, column or box. The difficulty lies in that each vertical nine-square column, or horizontal nine-square line across, within the larger square, must also contain the numbers 1-9, without repetition or omission.</br> <center> GOOD LUCK ! </center></div>
</br></br>
</br></br></br>
<div class="rectangle2"></div>
<div class="logout" > <p> Log out </p></div>
<div class="logoutimg"><img src="deco.png" alt="déconnexion" id="image_deco" id="deco" onClick="javascript:document.location.href='deconnexion.php'" /></div>
<div class="personimg"><img src="person.png"></div>
<?php 
include("footer.php");
?>
</body>

</html>