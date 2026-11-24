<?php 
$title = "";
if($_GET['reporte'] == 'E'){
	require($_SERVER['DOCUMENT_ROOT'].'/margaritaLeal/php/funciones/estudiantes.php');
	$e = new Estudiante;

	if($_GET['tipo'] == 'G'){
		$data = $e->read();
	}

	if($_GET['tipo'] == 'I'){
		$data = $e->readOnly($_GET['dato']);
	}	

	$title = "Estudiante(s)";
}

if($_GET['reporte'] == 'M'){
	require($_SERVER['DOCUMENT_ROOT'].'/margaritaLeal/php/funciones/materias.php');
	$m = new Materia;
	if($_GET['tipo'] == 'G'){
		$data = $m->read();
	}

	if($_GET['tipo'] == 'I'){
		$data = $m->readOnly($_GET['dato']);
	}	

	$title = "Materia(s)";
}



?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reporte</title>
	<link rel="stylesheet" href="css/styles.css">
</head>
<body class="p">
	<h2>Universidad "Margarita Leal"</h2>
	<hr>
	<br>
	<h4 class="center">Reporte de <?php echo $title; ?></h4>
	<br>
	<?php if($_GET['reporte'] == 'E'){ ?>
	<table>
		<thead>
			<tr>
				<th>Cédula</th>
				<th>Nombres</th>
				<th>Apellidos</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($data)){ ?>
			<?php 	if($_GET['tipo'] == 'G'){ ?>
			<?php 		foreach($data as $key){ ?>
			<tr>
				<td>
					<?php echo $key['cedula']; ?>
				</td>
				<td>
					<?php echo $key['nombres']; ?>
				</td>
				<td>
					<?php echo $key['apellidos']; ?>
				</td>
			</tr>
			<?php 		} ?>
			<?php 	} ?>
			<?php 	if($_GET['tipo'] == 'I'){ ?>
			<tr>
				<td>
					<?php echo $data['cedula']; ?>
				</td>
				<td>
					<?php echo $data['nombres']; ?>
				</td>
				<td>
					<?php echo $data['apellidos']; ?>
				</td>
			</tr>
			<?php 	} ?>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>

	<?php if($_GET['reporte'] == 'M'){ ?>
	<table>
		<thead>
			<tr>
				<th>Código</th>
				<th>Nombre</th>
			</tr>
		</thead>
		<tbody>
			<?php if(!empty($data)){ ?>
			<?php 	if($_GET['tipo'] == 'G'){ ?>
			<?php 		foreach($data as $key){ ?>
			<tr>
				<td>
					<?php echo $key['codigomateria']; ?>
				</td>
				<td>
					<?php echo $key['nombremateria']; ?>
				</td>
			</tr>
			<?php 		} ?>
			<?php 	} ?>
			<?php 	if($_GET['tipo'] == 'I'){ ?>
			<tr>
				<td>
					<?php echo $data['codigomateria']; ?>
				</td>
				<td>
					<?php echo $data['nombremateria']; ?>
				</td>
			</tr>
			<?php 	} ?>
			<?php } ?>
		</tbody>
	</table>
	<?php } ?>
</body>
</html>