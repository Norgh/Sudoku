<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="site.css">
<head>
    <title>User Database</title>
    <meta charset="UTF-8"/>
</head>

<body>
<center>
    <?php
        include('menu.php');
        include('include/connexion.php'); // Connecting to the database
        $login = $_SESSION['login']; // We need the user's ID to find their identifiants in the database
        $requete = "SELECT `Login`, `Nickname`, `Password` From `user` WHERE `Login` = '$login'"; // The request itself using the ID
        $result = mysqli_query($link,$requete); // The result
        $row = mysqli_fetch_array($result); // Doing an array with the row found by the request
        $nickname = $row['Nickname'];// Taking out the nickname of the database to display it
        $password = $row['Password'];
        // There we print the form so that the user can see his current infos and modify them
	    echo '
		<div class="backuser"></div>
		<div class="fonduserdata">
			<form method="post" action="userdata_action.php">
			</br>
			<legend><h2>Your informations : </h2></legend>
			</br><label for="login">Login</label> :
			<input type="text" disabled="disabled" name="login" id="login" value="'.$login.'"/>
			</br></br>
			<label for="nickname">Nickname</label> :
			<input type="text" name="nickname" id="nickname" value="'.$nickname.'"/>
			</br></br>
			<label for="password">New Password</label> :
			<input type="password" name="password" id="password" required="required"/>
			</br></br>
			<input style="background: #2e8b57; border: 0px; cursor: pointer; text-decoration: underline; type="submit" name="update" class = "editprofilebutton" id="button" value="Update"/>
			</form>
		</div>
		<div class="editimg"><img src="edit.png"></div>';
    ?>
</center>
</body>
</html>