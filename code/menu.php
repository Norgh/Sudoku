<!DOCTYPE html>
<!-- Pierre Sénéchal | Augustin Mariage | Judith Lecocq | François Beaucour -->
<html lang="en">
<head>
<meta charset="utf-8">      
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="site.css">
<title> Sudoku Gang </title>
</head>
<body>
</br> </br> </br> </br>
 <nav>
        <ul>
            <li><a class="accueil" href="Accueil.php"><i class="fa fa-home" aria-hidden="true"></i> </a></li>
            <li><a class="active" href="sudoku.php?level=B"> Beginner Level </a></li>
			<li><a href="sudoku.php?level=M"> Medium Level </a></li>
            <li><a href="sudoku.php?level=E"> Expert Level </a></li>
			<li><a href="scoreboard.php"> Scores </a></li>
			<li><a href="editor.php"> My Sudokus </a></li>
			<li><img src="deco.png" alt="déconnexion" id="image_deco2" id="deco" onClick="javascript:document.location.href='deconnexion.php'" /></li>
</nav>

<div align="left"><div class="logomenu"><a class="accueil" href="Accueil.php"><img src="logo.png" width="200" height="162" alt="Logo" ></a></div></div>
<div align="right"><div class="profileimg"><img src="profile.png" width="30" height="30" alt="profileimg" ></a></div></div>

		<?php 		
		include('include/session.php'); // Checking the session
        $login = $_SESSION['login']; 
		echo '<div align="right"><div class="Profilmenu">';
		echo '<p><center> '.$login.' </center></p>' ;
		echo "<center> <div class='modifprofil' style='background: #C8C8C8; opacity: 60%; cursor: pointer;'><a href='userdata.php'> Modify my profil </a></div></center>";
		echo '</div></div>';
		?>


</div>
<body>
