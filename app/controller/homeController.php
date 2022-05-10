<?php 
class homeController
{

	public function index()
	{	
		include ("view/layout.php");
		if (!isset($_SESSION["id"])) {
			include ("model/Model.php");include ("loginController.php");include ("view/loginView.php");
		}
		else{
			include ("model/Model.php");include ("acceuilController.php");include ("view/acceuilView.php");include ("view/layout.php");
		}
	}
}