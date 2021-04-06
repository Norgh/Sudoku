<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<link rel="stylesheet" href="site.css">
</head>

<body>
<!-- Creating the form to log into the site -->
<div id="container">
<form method="post" id="form1" action="site_action.php">
    <h1>Connection</h1>
	<div class="infoconnect"
    <label for="login">Login</label> :
    <input type="text" name="login" id="login" required/>
    </br></br></br>
    <label for="password">Password</label> :
    <input type="password" name="password" id="password" required/>
	</br>
    </br>
    <input style="background: #2e8b57; border: 0px; cursor: pointer; text-decoration: underline;" type="submit" name="Connection" id="Connection" value="Sign in"/>
	</br>
	<p>You don't have any account yet? Create one here :</div>
	<input style="background: #2e8b57; border: 0px; cursor: pointer; text-decoration: underline;" type="button" onClick="javascript:document.location.href='inscription.php'" name="sign up" href="inscription.php"id="sign up" value="Sign up"/></p> <!-- redirecting to the page for inscription -->
</form>
</div>
</body>
</html>