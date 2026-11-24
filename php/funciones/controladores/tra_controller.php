<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lacasona/php/funciones/Trabajadores.php");
class TrabajadorControlador
{
	private $class;

	public function __construct()
	{
		$this->class = new Trabajador;
	}

	public function read(){
		$workers = $this->class->read();
		include('php/views/workers/index.php');
	}

	public function create(){
		// $m = (new Materia)->read();
		include('php/views/workers/create.php');
	}

	public function store($a){
		if($this->class->create($a)){
			header('location: ?route=worker&method=index&msj=success');
		}else{
			// header('location: ?route=worker&method=index&msj=error');
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