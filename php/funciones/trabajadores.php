<?php 
// Importación de Base de datos
require_once($_SERVER['DOCUMENT_ROOT'].'/lacasona/php/bd/conn.php');;

//Clase Estudiante

class Trabajador extends BDConexion
{

	public function __construct(){
		self::conectar();
	}

	// Función de reporte de datos General de trabajadores

	public function read(){
		$sql = "SELECT * FROM trabajadores";
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


	// Función de óbtención de datos de un solo registro de trabajadores
	public function readOnly($a){
		$sql = "SELECT * FROM trabajadores WHERE id = :id";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':id', $a);
		if($pdo->execute()){
			return $pdo->fetch(PDO::FETCH_ASSOC);
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de filtrado para óbtención de datos de registros de trabajadores
	public function filter($a){
		$sql = "SELECT * FROM trabajadores WHERE $a[filtro1] LIKE '%$a[dato1]%'";	
		
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
		$sql = "INSERT INTO trabajadores (cedula, nombre, apellido, direccion, fecha_nacimiento, edad, area, email, telefono, estado) VALUES (:cedula, :nombre, :apellido, :direccion, :fecha_nacimiento, :edad, :area, :email, :telefono, :estado)";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a['cedula']);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':apellido', $a['apellido']);
		$pdo->bindParam(':direccion', $a['direccion']);
		$pdo->bindParam(':fecha_nacimiento', $a['fecha_nacimiento']);
		$pdo->bindParam(':edad', $a['edad']);
		$pdo->bindParam(':area', $a['area']);
		$pdo->bindParam(':email', $a['email']);
		$pdo->bindParam(':telefono', $a['telefono']);
		$pdo->bindParam(':estado', $a['estado']);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de actualización de registro de estudiante
	public function update($a){
		$sql = "UPDATE trabajadores SET cedula = :cedula, nombre = :nombre, apellido = :apellido, direccion = :direccion, fecha_nacimiento = :fecha_nacimiento, edad = :edad, area = :area, email = :email, telefono = :telefono, estado = :estado WHERE id = :old";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a['cedula']);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':apellido', $a['apellido']);
		$pdo->bindParam(':direccion', $a['direccion']);
		$pdo->bindParam(':fecha_nacimiento', $a['fecha_nacimiento']);
		$pdo->bindParam(':edad', $a['edad']);
		$pdo->bindParam(':area', $a['area']);
		$pdo->bindParam(':email', $a['email']);
		$pdo->bindParam(':telefono', $a['telefono']);
		$pdo->bindParam(':estado', $a['estado']);
		$pdo->bindParam(':old', $a['old']);
		if($pdo->execute()){
			return true;
		}else{
			print_r($pdo->errorInfo());
		}
	}


	// Función de eliminación de registro de estudiante
	public function del($a){
		$sql = "DELETE FROM trabajadores WHERE id = :cedula";
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