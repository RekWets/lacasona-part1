<?php 
// Importación de Base de datos
require_once($_SERVER['DOCUMENT_ROOT'].'/lacasona/php/bd/conn.php');;

//Clase Estudiante

class Historial extends BDConexion
{

	public function __construct(){
		self::conectar();
	}

	// Función de reporte de datos General de historial

	public function read(){
		$sql = "SELECT * FROM historial h INNER JOIN trabajadores t ON t.id = h.id_trabajador";
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


	// Función de óbtención de datos de un solo registro de historial
	public function readOnly($a){
		$sql = "SELECT * FROM historial WHERE id = :id";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':id', $a);
		if($pdo->execute()){
			return $pdo->fetch(PDO::FETCH_ASSOC);
		}else{
			print_r($pdo->errorInfo());
		}
	}

	// Función de filtrado para óbtención de datos de registros de historial
	public function filter($a){
		$sql = "SELECT * FROM historial WHERE $a[filtro1] LIKE '%$a[dato1]%'";	
		
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
		date_default_timezone_set('America/Caracas');
		$fecha = date('Y-m-d');
		$hora = date('H:i:s', time());
		$fData = [];

		$sql = "SELECT * FROM trabajadores WHERE id = :id AND cedula = :cedula";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':id', $a['id_trabajador']);
		$pdo->bindParam(':cedula', $a['cedula']);
		if($pdo->execute()){
			$worker = $pdo->fetch(PDO::FETCH_ASSOC);

			if(empty($worker)){
				return "notExist";
			}
		}else{
			print_r($pdo->errorInfo());
		}


		$sql = "SELECT * FROM historial WHERE id_trabajador = '$a[id_trabajador]' AND fecha = '$fecha'";
		$pdo = $this->con->prepare($sql);
		$pdo->execute();
		if($pdo->rowCount() == 0){
			$sql = "INSERT INTO historial (id_trabajador, fecha, hora_entrada) VALUES (:id_trabajador, :fecha, :hora_entrada)";
			$pdo = $this->con->prepare($sql);
			$pdo->bindParam(':id_trabajador', $a['id_trabajador']);
			$pdo->bindParam(':fecha', $fecha);
			$pdo->bindParam(':hora_entrada', $hora);
			$pdo->execute();
		}else{
			$data = $data = $pdo->fetch(PDO::FETCH_ASSOC);
			
			if($a['en_sa'] == "SA"){
				if($data['hora_entrada'] == ""){
					return "notInHour";
				}

				if($data['hora_salida'] != ""){
					return "inHourSa";
				}

				$sql = "UPDATE historial SET  hora_salida = :hora_salida WHERE id = :id";
				$pdo = $this->con->prepare($sql);
				$pdo->bindParam(':hora_salida', $hora);
				$pdo->bindParam(':id', $data['id']);
				$pdo->execute();
			}	

			if($a['en_sa'] == "EN"){
				if($data['hora_entrada'] != ""){
					return "inHour";
				}
			}		
		}


		

		$sql = "SELECT * FROM historial WHERE id_trabajador = '$a[id_trabajador]' AND fecha = '$fecha'";
		$pdo = $this->con->prepare($sql);
		$pdo->execute();
		$history = $pdo->fetch(PDO::FETCH_ASSOC);

		return ['trabajador' => $worker, 'historial' => $history];

		

	}

	// Función de actualización de registro de estudiante
	public function update($a){
		$sql = "UPDATE historial SET cedula = :cedula, nombre = :nombre, apellido_p = :apellido_p, apellido_m = :apellido_m, direccion = :direccion, fecha_nacimiento = :fecha_nacimiento, edad = :edad, area = :area, estado = :estado WHERE id = :old";
		$pdo = $this->con->prepare($sql);
		$pdo->bindParam(':cedula', $a['cedula']);
		$pdo->bindParam(':nombre', $a['nombre']);
		$pdo->bindParam(':apellido_p', $a['apellido_p']);
		$pdo->bindParam(':apellido_m', $a['apellido_m']);
		$pdo->bindParam(':direccion', $a['direccion']);
		$pdo->bindParam(':fecha_nacimiento', $a['fecha_nacimiento']);
		$pdo->bindParam(':edad', $a['edad']);
		$pdo->bindParam(':area', $a['area']);
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
		$sql = "DELETE FROM historial WHERE id = :cedula";
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