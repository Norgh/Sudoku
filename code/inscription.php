<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="site.css">
</head>
<body>  <!-- The form to create your account  -->

<div id="container2">
<form method="post" id="form2" action="inscription_action.php">
    <div class="Join"> <p> Join the Sudo'Gang ! </p> </div>
    </br>
	<div class="infoinscri">
    <label for="nickname">Nickname</label> :
    <input type="text" name="nickname" id="nickname" required/>
    </br></br>
    <label for="login">Login</label> :
    <input type="text" name="login" id="login" required/>
    </br></br>
    <label for="password">Password</label> :
    <input type="password" name="password" id="password" required/>
    </br></br>
	</div>	
	<input style="background: #2e8b57; border: 0px; cursor: pointer; text-decoration: underline;" type="submit" name="Validate" id="bouton" value="Sign up"/>
</form>
</div>
</body>
</html>