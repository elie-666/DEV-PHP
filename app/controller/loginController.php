<?php 

if (isset($_POST["submit"])) {

	$register = new Register();

	$result = $register->registration($_POST["name"], $_POST["username"], $_POST["email"], $_POST["password"], $_POST["confirmpassword"]);

	if ($result == 1) {
		echo "<script> alert('Votre compte a été créé avec succés '); </script>";
	}
	elseif ($result == 10) {
		echo "Ce nom d'utilisateur ou email existe déja";
	}
	elseif ($result == 100) {
		echo "<script> alert('le mot de passe ne correspond pas'); </script>";
	}
}

if (isset($_POST["login"])) {

	$login = new Login();

	$res = $login->log($_POST["mail"], $_POST["pass"]);

	if ($res == 1) {
		$_SESSION["login"] = true;
		$_SESSION["id"] = $login->idUser();
		$_SESSION["name"] = $login->nameUser();
		$_SESSION["username"] = $login->usernameUser();
		header("refresh:0");
	}
	elseif ($res == 10) {
		echo "<script> alert('Mauvais mot de passe'); </script>";
	}
	elseif ($res == 100) {
		echo "<script> alert('Utilisateur Non enregistré'); </script>";
	}
}

