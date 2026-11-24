<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lacasona/php/funciones/autenticador.php");

class AutenticadorControlador
{
	private $class;

	public function __construct()
	{
		$this->class = new Autenticador;
	}

	public function login($request){
		$data = $this->class->login($request);
		if(!empty($data)){
			session_start();
			foreach($data as $key => $value){
				$_SESSION['data'] = $value;
			}
			$_SESSION['data']['test_timer'] = 0;
			return true;
		}else{
			return array("type"=> "error", "msj" => "Usuario/Contraseña Inválida.");
		}
	}

	public function logout(){
		session_start();
		session_destroy();
		return true;
	}
}

?>