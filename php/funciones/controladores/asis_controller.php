<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lacasona/php/funciones/asistencias.php");
class AsistenciaControlador
{
	private $class;

	public function __construct()
	{
		$this->class = new Historial;
	}

	public function read(){
		$workers = $this->class->read();
		include('php/views/history/index.php');
	}

	public function create(){
		// $m = (new Materia)->read();
		include('php/views/workers/create.php');
	}

	public function store($a){
		if($data = $this->class->create($a)){
			include('php/views/web/asistencia.php');
		}else{
			header('location: ?msj=error');
		}
	}

	public function edit($id)
	{
		$s = $this->class->readOnly($id);
		include('php/views/workers/edit.php');
	}

	public function update($a)
	{
		if($this->class->update($_POST)){
			header('location: ?route=worker&method=index&msj=success');
		}else{
			header('location: ?route=worker&method=index&msj=error');
		}
	}

	public function destroy($a){
		if($this->class->del($a)){
			header('location: ?route=worker&method=index&msj=success');
		}else{
			header('location: ?route=worker&method=index&msj=error');
		}
	}

	public function filter($a){
		if($workers = $this->class->filter($a)){
			include('php/views/workers/index.php');
		}else{
			include('php/views/workers/index.php');
		}
	}
}

?>