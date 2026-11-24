<?php 
require_once($_SERVER['DOCUMENT_ROOT']."/lacasona/php/funciones/usuarios.php");
class UsuarioControlador
{
	private $class;

	public function __construct()
	{
		$this->class = new Usuario;
	}

	public function read(){
		$users = $this->class->read();
		include('php/views/users/index.php');
	}

	public function create(){
		// $m = (new Materia)->read();
		include('php/views/users/create.php');
	}

	public function store($a){
		if($this->class->create($a)){
			header('location: ?route=user&method=index&msj=success');
		}else{
			header('location: ?route=user&method=index&msj=error');
		}
	}

	public function edit($id)
	{
		$m = $this->class->readOnly($id);
		include('php/views/users/edit.php');
	}

	public function update($a)
	{
		if($this->class->update($_POST)){
			header('location: ?route=user&method=index&msj=success');
		}else{
			header('location: ?route=user&method=index&msj=error');
		}
	}

	public function destroy($a){
		if($this->class->del($a)){
			header('location: ?route=user&method=index&msj=success');
		}else{
			header('location: ?route=user&method=index&msj=error');
		}
	}

	public function filter($a){
		if($users = $this->class->filter($a)){
			include('php/views/users/index.php');
		}else{
			include('php/views/users/index.php');
		}
	}
}

?>