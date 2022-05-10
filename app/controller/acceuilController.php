<?php
if (isset($_POST["Logout"])) {
	session_destroy();
	header("refresh:0");
}

if (isset($_POST["Publier"])) {
	
	$nomPhoto=$_FILES['photo']['name'];
	$fichierTempo=$_FILES['photo']['tmp_name'];
	move_uploaded_file($fichierTempo,'../public/img/'.$nomPhoto);
	$publier = new Publier();
	$record = $publier->pub($_POST["contenu"], $nomPhoto, $_SESSION["id"], $_SESSION["name"], $_SESSION["username"]);
	if ($record == 1) {
	}
}

if (isset($_POST["comment"])) {

	$commenter = new Commenter();
	$rec = $commenter->comt($_POST["id_pub"], $_POST["commentaire"], $_SESSION["name"], $_SESSION["username"]);
	if ($rec == 1) {
	}
}