<?php 
// Importación de Base de datos
require_once($_SERVER['DOCUMENT_ROOT'].'/lacasona/php/bd/conn.php');;

//Clase Usuario

class Usuario extends BDConexion
{

	public function __construct(){
		self::conectar();
	}

	// Función de reporte de datos General de usuarios

	public function read(){
		$sql = "SELECT * FROM usuarios";
		$pdo = $this->con->prepare($sql);
		if($pdo->execute()){
			$data = [];
			while($fila = $pdo->fetch(PDO::FETCH_ASSOC)){
				$data[] = $fila;
			}
			return $data;
		}else{
			print_r($pdo->errorInfo());
		}
	}


	// Función de óbtención de datos de un solo registro de usuarios
	public function readOnly($a){
		$sql = "SELECT * FROM usuarios WHERE id = :id";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':id', $a);
		if($pdo->execute()){
			return $pdo->fetch(PDO::FETCH_ASSOC);
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de filtrado para óbtención de datos de registros de usuarios
	public function filter($a){
		$sql = "SELECT * FROM usuarios WHERE ";	
		
		if($a['cantidad'] == 1){
			$sql .= $a['filtro1'] . " LIKE '%" . $a['dato1'] . "%'";
	 	}

	 	if($a['cantidad'] == 2){
			$sql .= $a['filtro1'] . " LIKE '%" . $a['dato1'] . "%' " . $a['accion'] . " ". $a['filtro2'] . " LIKE '%" . $a['dato2'] . "%' "; 
	 	}
		
		$pdo = $this->con->prepare($sql);
		if($pdo->execute()){
			$data = [];
			while($fila = $pdo->fetch(PDO::FETCH_ASSOC)){
				$data[] = $fila;
			}
			return $data;
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de inserción de registro de estudiante
	public function create($a){
		$sql = "INSERT INTO usuarios (nombre, usuario, password, rol) VALUES (:nombre, :email, :password, :rol)";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':email', $a['email']);
		$pdo->bindParam(':password', $a['password']);
		$pdo->bindParam(':rol', $a['rol']);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de actualización de registro de estudiante
	public function update($a){
		$sql = "UPDATE usuarios SET nombre = :nombre, usuario = :email, password = :password, rol = :rol WHERE id = :old";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':email', $a['email']);
		$pdo->bindParam(':password', $a['password']);
		$pdo->bindParam(':rol', $a['rol']);
		$pdo->bindParam(':old', $a['old']);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}


	// Función de eliminación de registro de estudiante
	public function del($a){
		$sql = "DELETE FROM usuarios WHERE id = :id";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':id', $a);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}
}



?>