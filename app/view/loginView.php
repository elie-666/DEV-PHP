<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body class="login">
	<div class="container">
	<div class='modal-dialog' role='document'>
    <div class='modal-content'>
    <div class='modal-body' style='color:black'>
	<h3>Se connecter</h3>
		<form class="" action="" method="post" autocomplete="off">
			<label class="form-group">Identifian ou Email : </label>
			<input class="form-control" type="text" name="mail" required value=""><br>
			<label>mot de passe : </label>
			<input class="form-control" type="password" name="pass" required value=""><br>
			<button class="btn btn-primary" type="submit" name="login">Connexion</button>
		</form><br>
		<a onclick="myFunction()">Creer compte</a>
	<div id="myDIV" hidden="hidden"> 
	<h3>Créer un compte</h3>
		<form class="" action="" method="post" autocomplete="off">
			<label>Nom de famille : </label>
			<input type="text" name="name" required value="" class="form-control"><br>
			<label>Prénom : </label>
			<input type="text" name="username" required value="" class="form-control"><br>
			<label>email : </label>
			<input type="text" name="email" required value="" class="form-control"><br>
			<label>Mot de passe : </label>
			<input type="password" name="password" required value="" class="form-control"><br>
			<label>confirme votre mot de passe: </label>
			<input type="password" name="confirmpassword" required value="" class="form-control"><br>
			<button class="btn btn-danger" type="submit" name="submit">Enregistrer</button>
		</form>
	</div>
	</div>
	</div>
	</div>
	</div>
</body>
</html>