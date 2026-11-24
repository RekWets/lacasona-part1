<?php 
// Importación de Base de datos
require_once($_SERVER['DOCUMENT_ROOT'].'/lacasona/php/bd/conn.php');;

//Clase Estudiante

class Autenticador extends BDConexion
{

	public function __construct(){
		self::conectar();
	}

	// Función de reporte de datos General de estudiantes

	public function login($a){
		$sql = "SELECT * FROM usuarios WHERE usuario = '$a[email]' AND password = $a[password]";
		$pdo = $this->con->prepare($sql);
		if($pdo->execute()){
			if($pdo->rowCount() > 0){
				$data = [];
				while($fila = $pdo->fetch(PDO::FETCH_ASSOC)){
					$data[] = $fila;
				}
				return $data;

			}else{
				return false;
			}
		}else{
			print_r($pdo->errorInfo());
		}
	}


	// Función de óbtención de datos de un solo registro de estudiantes
	public function readOnly($a){
		$sql = "SELECT * FROM estudiantes WHERE cedula = :cedula";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a);
		if($pdo->execute()){
			return $pdo->fetch(PDO::FETCH_ASSOC);
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de filtrado para óbtención de datos de registros de estudiantes
	public function filter($a){
		$sql = "SELECT * FROM estudiantes WHERE ";	
		
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
		$sql = "INSERT INTO estudiantes (cedula, nombres, apellidos, codigomateria) VALUES (:cedula, :nombre, :apellido, :materia)";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a['cedula']);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':apellido', $a['apellido']);
		$pdo->bindParam(':materia', $a['materia']);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de actualización de registro de estudiante
	public function update($a){
		$sql = "UPDATE estudiantes SET cedula = :cedula, nombres = :nombre, apellidos = :apellido, codigomateria = :materia WHERE cedula = :old";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a['cedula']);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':apellido', $a['apellido']);
		$pdo->bindParam(':materia', $a['materia']);
		$pdo->bindParam(':old', $a['old']);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}


	// Función de eliminación de registro de estudiante
	public function del($a){
		$sql = "DELETE FROM estudiantes WHERE cedula = :cedula";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}
}



?>