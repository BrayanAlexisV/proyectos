<?php

Class Connection{
	private $server = "mysql:host=localhost;dbname=ejercicio";
	private $username = "root";
	private $password = "";
	protected $conn;
	
	public function open(){
 		try{
 			$this->conn = new PDO($this->server, $this->username, $this->password, );
 			return $this->conn;
 		}
 		catch (PDOException $e){
 			echo "Hubo un problema con la conexión: " . $e->getMessage();
 		}
 
    }
 
	public function close(){
   		$this->conn = null;
 	}
 
}
 
?>