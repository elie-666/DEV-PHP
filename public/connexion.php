<?php
class Connexion{	
	private $db_host = 'localhost';
	private $db_user = 'root';
	private $db_pass = '';
	private $db_name = 'blog';
	public $mysqli;
	
	public function __construct(){
		if (!isset($this->mysqli)) {
            
            $this->mysqli = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
            
            if (!$this->mysqli) {
                printf("Connection failed: %s\ ", mysqli_connect_error()); 
                exit();
            }            
        }    
        return $this->mysqli;
	}
}
?>