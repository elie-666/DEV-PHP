<?php

class Connection
{
	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_name = 'blog';
	
	public function __construct(){     
        $this->conn = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);   
    }
}

class Register extends Connection
{	
	public function registration($name, $username, $email, $password, $confirmpassword){
		$duplicate = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE username = '$username' OR email = '$email'");
		if (mysqli_num_rows($duplicate) > 0) {
			return 10;
		}
		else{
			if($password == $confirmpassword) {
				$pass=md5($password);
				$query = "INSERT INTO tb_user VALUES(NULL, '$name', '$username', '$email', '$pass')";
				mysqli_query($this->conn, $query);
				return 1;
			}
			else{
				return 100;
			}
		}
	}
}

class Login extends Connection
{	
	public $id;
	public $name;
	public $username;

	public function log($mail, $pass)
	{
		$res = mysqli_query($this->conn, "SELECT * FROM tb_user WHERE email = '$mail' OR username = '$mail'");
		$row = mysqli_fetch_assoc($res);
		$mdp = md5($pass);

		if(mysqli_num_rows($res) > 0){
			if ($mdp == $row["password"]) {
				$this->id = $row["id"];
				$this->name = $row["name"];
				$this->username = $row["username"];
				return 1;
			}
		}
		else{
			return 100;
		}
	}

	public function idUser(){
		return $this->id;
	}
	public function nameUser(){
		return $this->name;
	}
	public function usernameUser(){
		return $this->username;
	}
}

class Publier extends Connection
{	
	public function pub($contenu, $fichier, $id, $name, $username)
	{
		$query1 = "INSERT INTO article VALUES(NULL, '$contenu', '$fichier', '$id', '$name', '$username', CURRENT_TIMESTAMP)";
		mysqli_query($this->conn, $query1);
		return 1;
	}
	
}

function TimeAgo ($oldTime, $newTime) {
$timeCalc = strtotime($newTime) - strtotime($oldTime);
if ($timeCalc >= (60*60*24*30*12*2)){
	$timeCalc = intval($timeCalc/60/60/24/30/12) . " ans";
	}else if ($timeCalc >= (60*60*24*30*12)){
		$timeCalc = intval($timeCalc/60/60/24/30/12) . " ans";
	}else if ($timeCalc >= (60*60*24*30*2)){
		$timeCalc = intval($timeCalc/60/60/24/30) . " mois";
	}else if ($timeCalc >= (60*60*24*30)){
		$timeCalc = intval($timeCalc/60/60/24/30) . " mois";
	}else if ($timeCalc >= (60*60*24*2)){
		$timeCalc = intval($timeCalc/60/60/24) . " jours";
	}else if ($timeCalc >= (60*60*24)){
		$timeCalc = " hier";
	}else if ($timeCalc >= (60*60*2)){
		$timeCalc = intval($timeCalc/60/60) . " heurs";
	}else if ($timeCalc >= (60*60)){
		$timeCalc = intval($timeCalc/60/60) . " heur";
	}else if ($timeCalc >= 60*2){
		$timeCalc = intval($timeCalc/60) . " minutes";
	}else if ($timeCalc >= 60){
		$timeCalc = intval($timeCalc/60) . " minute";
	}else if ($timeCalc > 0){
		$timeCalc .= " seconds";
	}
return $timeCalc;
}

class Affiche extends Connection
{	

	public function afficherArticle(){

		$req = mysqli_query($this->conn, "SELECT * FROM article");
		while ($res=mysqli_fetch_array($req))
		{	
		$idd = $res['id'];
		$com = mysqli_query($this->conn, "SELECT * FROM commentaire WHERE id_article = '$idd'");
		echo "<table class='table table-bordered'><thead><tr><td>
		<img src='../public/img/images.jpg' alt='user' class='profile-photo-md pull-left'>
                <div class='post-detail'>
                  <div class='user-info'><h5><a><b>". $res['nom_auteur'];
        echo" "; 
        echo $res['prenom_auteur'] ."</a></b></h5><p class='text-muted'> il y a ";
        echo TimeAgo($res['date_creation'], date("Y-m-d H:i:s"));
		echo "</p><div class='line-divider'></div><div class='post-text'><p>";
		echo $res['contenu'];
		echo "<i class='em em-anguished'></i> <i class='em em-anguished'></i> <i class='em em-anguished'></i></p></div>";
		if (!empty($res['fichier'])){
		echo "<img src='../public/img/". ($res['fichier']) ."' width='400px'; heigth='auto';>";};
		echo "<div class='line-divider'></div>";
		while ($comres=mysqli_fetch_array($com))
		{	echo "<div class='post-comment'><img src='../public/img/images.jpg' class='profile-photo-sm'>";
			echo "<p><a class='profile-link'><b>";
			echo $comres['nom_auteur'];
			echo" ";
			echo $comres['prenom_auteur'];
			echo "</b></a><i class='em em-laughing'></i></br>";
			echo $comres['value'];
			echo "</p>
			</div>";
		};
		echo"<form  method='post' autocomplete='off'><textarea req type='text' name='commentaire' placeholder='votre commentaire...' class='form-control'></textarea><input type='hidden' name='id_pub' value='". $res['id'] ."'/ readonly><input type='hidden' name='nom' value='". $res['nom_auteur'] , $res['prenom_auteur'] ."'/ readonly><button class='btn btn-secondary' type='submit' name='comment'>Commenter</button></form>
		</td></tr></table>";
		}
	}
}

class Commenter extends Connection
{	
	public function comt($id_pub, $commentaire, $name, $username)
	{
		$query1 = "INSERT INTO commentaire VALUES(NULL, '$id_pub', '$commentaire', '$name', '$username', CURRENT_TIMESTAMP)";
		mysqli_query($this->conn, $query1);
		return 1;
	}
	
}