<?php 
date_default_timezone_set("America/Caracas");
require_once($_SERVER['DOCUMENT_ROOT']."/lacasona/dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$sa = false; //section activa
if(isset($_REQUEST['route']) && isset($_REQUEST['method'])){
		switch ($_REQUEST['route']) {
			// Inicio del case Student
			case 'worker':
				require('controladores/tra_controller.php');
				$trabajadorControlador = new TrabajadorControlador;
				switch ($_REQUEST['method']) {
					// Muestra Formulario de creación de trabajador.
					case 'create':
						$trabajadorControlador->create();
						break;

					// Guarda datos del trabajador en BD.
					case 'save':
						$trabajadorControlador->store($_POST);
						break;

					// Muestra Formulario de actualización de trabajador.
					case 'edit':
						$trabajadorControlador->edit($_GET['id']);
						break;

					// Actualiza datos del trabajador en BD.
					case 'update':
						$trabajadorControlador->update($_POST);
						break;

					// Filtra una busqueda de datos de trabajadors en BD.
					case 'filter':
						$trabajadorControlador->filter($_POST);
						break;

					// Elimina registro del trabajador en BD.
					case 'delete':
						$trabajadorControlador->destroy($_GET['id']);
						break;
					
					// Muestra vista con todos los registros de trabajadors existentes
					case 'index':
						$trabajadorControlador->read();
						break;
				}
				break;
			// Fin del case Student

			// Inicio del case user
			case 'user':
				require('controladores/user_controller.php');
				$usuarioControlador = new UsuarioControlador;
				switch ($_REQUEST['method']) {
					// Muestra Formulario de creación de actividad.
					case 'create':
						$usuarioControlador->create();
						break;

					// Guarda datos del actividad en BD.
					case 'save':
						$usuarioControlador->store($_POST);
						break;

					// Muestra Formulario de actualización de actividad.
					case 'edit':
						$usuarioControlador->edit($_GET['id']);
						break;

					// Actualiza datos del actividad en BD.
					case 'update':
						$usuarioControlador->update($_POST);
						break;

					// Filtra una busqueda de datos de actividads en BD.
					case 'filter':
						$usuarioControlador->filter($_POST);
						break;

					// Elimina registro del actividad en BD.
					case 'delete':
						$usuarioControlador->destroy($_GET['id']);
						break;
					
					// Muestra vista con todos los registros de estudiantes existentes
					case 'index':
						$usuarioControlador->read();
						break;
				}
				break;
			// Fin del case user

			// Inicio del case history
			case 'history':
				require('controladores/asis_controller.php');
				$asistenciaControlador = new AsistenciaControlador;
				switch ($_REQUEST['method']) {
					// Muestra Formulario de creación de actividad.
					case 'create':
						$asistenciaControlador->create();
						break;

					// Guarda datos del actividad en BD.
					case 'save':
						$asistenciaControlador->store($_POST);
						break;

					// Muestra Formulario de actualización de actividad.
					case 'edit':
						$asistenciaControlador->edit($_GET['id']);
						break;

					// Actualiza datos del actividad en BD.
					case 'update':
						$asistenciaControlador->update($_POST);
						break;

					// Filtra una busqueda de datos de actividads en BD.
					case 'filter':
						$asistenciaControlador->filter($_POST);
						break;

					// Elimina registro del actividad en BD.
					case 'delete':
						$asistenciaControlador->destroy($_GET['id']);
						break;
					
					// Muestra vista con todos los registros de estudiantes existentes
					case 'index':
						$asistenciaControlador->read();
						break;
				}
				break;
			// Fin del case history
			
			// Inicio del case Reports
			case 'reports':
				switch ($_REQUEST['method']) {
					case 'generate':
						include('php/views/web/reports.php');
						break;

					case 'pdf':
						$r = $_POST['reporte'];
						$t = $_POST['tipo'];
						$d = (isset($_POST['dato1'])) ? $_POST['dato1'] : "";
						
						$html = file_get_contents("http://localhost/margaritaLeal/php/views/reports/template.php?reporte=$r&tipo=$t&dato=$d");	
						

						$pdf = new Dompdf();

						$pdf->setPaper ( "A4" ,  "portroid");

						$pdf->load_html($html);

						$pdf->render();
						$pdf->stream("Reporte", array("Attachment" => 0));
						break;
				}

			case 'auth':
				require('controladores/auth_controller.php');
				$authControlador = new AutenticadorControlador;
				switch ($_REQUEST['method']) {
					case 'login':
						include('php/views/auth/login.php');
						break;

					case 'login-in':
						$data = $authControlador->login($_POST);
						if($data['type'] == "error"){
							include('php/views/auth/login.php');
						}else{
							header('location: ?');
						}

						break;

					case 'login-out':
						$authControlador->logout();
						header('location: ?');
						break;
				}

			case 'page':
				switch ($_REQUEST['method']) {
					case 'history':
						include('php/views/web/history.php');
						break;

					case 'culture':
						include('php/views/web/culture.php');
						break;

					case 'gastronomy':
						include('php/views/web/gastronomy.php');
						break;
				}

			break;

			default:
				include('php/views/web/asistencia.php');	
			break;
		}
}else{
	session_start();
	if(isset($_SESSION) && !empty($_SESSION)){
		include('php/views/web/asistencia.php');	
	}else{
		include('php/views/web/home.php');
	}

}



?>