<?php 

class BDConexion
{
	private $host = "localhost";
	private $usr = "root";
	private $pass = "";
	private $db = "lacasona";
	protected $con;

	public function conectar()
	{
		try {
			$array = array(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			$this->con = new PDO("mysql:host=".$this->host.";dbname=".$this->db, $this->usr, $this->pass, $array);
			if ($this->con) {
				return $this->con;
			}else{
				die("Error al conectar");
			}
		} catch (Exception $e) {

			die("Error: ".$e->GetMessage());	

		}
	}
}