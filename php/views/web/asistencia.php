<?php include('php/views/partials/header.php'); ?>
<section class="container p-4 shadow my-4">
	<div class="row text-center">
		<h2 class="text-muted">Sistema de Control de Asistencia Laboral</h2>
	</div>
	<div class="row border rounded">
		<div class="col-md-4 border-end bg-light">
			<div id="form_reloj" class="p-2 text-center">
				<p id="reloj" class="h2">
				</p>
				<hr>
				<p id="fecha" class="h4">
			</div>		
			<form action="?route=history&method=save" method="POST">
				<div class="input-group mb-3">
				  <span class="input-group-text bg-info" id="basic-addon1"><i class="bi-person-video"></i></span>
				  <input type="text" class="form-control" placeholder="Número de Identifiación" aria-label="Username" aria-describedby="basic-addon1" required name="id_trabajador">
				</div>
				<div class="input-group mb-3">
				  <span class="input-group-text bg-info" id="basic-addon1"><i class="bi-person"></i></span>
				  <input type="text" class="form-control" placeholder="Nro de Cèdula" aria-label="Username" aria-describedby="basic-addon1" required name="cedula">
				</div>
				<hr>
				<input type="radio" name="en_sa" value="EN"> Entrada
				<input type="radio" name="en_sa" value="SA"> Salida
				<hr>
				<button class="btn btn-primary btn-lg w-100"><i class="bi-pencil"></i> Registrar</button>
			</form>

		</div>
		<div class="col-md-8 p-4">
			<?php if(!empty($data)){
					switch ($data) {
						case 'notExist':
								echo '<h4 class="text-center"><i>Este trabajador no existe en los registros...</i></h4>';
							break;

						case 'notInHour':
								echo '<h4 class="text-center"><i>Este trabajador no ha registrado una hora de entrada...</i></h4>';
							break;

						case 'inHour':
								echo '<h4 class="text-center"><i>Este trabajador ya ha registrado una hora de entrada...</i></h4>';
							break;

						case 'inHourSa':
								echo '<h4 class="text-center"><i>Este trabajador ya ha registrado una hora de salida...</i></h4>';
							break;
					 
						default:
						// code...
					?>

			<div class="row">
				<div class="col-md-4">
					<img src="img/2.png" alt="" class="w-100 m-auto my-5">
				</div>
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<p class="font-weight-bold"><b>Cèdula</b>: <span> V.- <?php echo $data['trabajador']['cedula']; ?></span></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-4">
							<p class="font-weight-bold"><b>Nombre</b>:</p>
							<p><?php echo $data['trabajador']['nombre']; ?></p>
						</div>
						<div class="col-md-4">
							<p class="font-weight-bold"><b>Apellido</b>:</p>
							<p><?php echo $data['trabajador']['apellido']; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<p class="font-weight-bold"><b>Direcciòn</b>:</p>
							<p><?php echo $data['trabajador']['direccion']; ?></p>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<p class="font-weight-bold"><b>Hora de Entrada</b>:</p>
							<p><?php echo $data['historial']['hora_entrada']; ?></p>
						</div>
						<div class="col-md-6">
							<p class="font-weight-bold"><b>Hora de Salida</b>:</p>
							<p><?php echo $data['historial']['hora_salida']; ?></p>
						</div>
					</div>
					<hr>
					<a href="?" class="btn btn-success w-100"><i class="bi-check"></i> Finalizar</a>
				</div>
			</div>
				<?php 

						break;
					} 
				?>
			<?php }else{ ?>
				<h4 class="text-center"><i>A la espera de un trabajador</i></h4>
			<?php } ?>
		</div>
	</div>
	

</section>
<?php include('php/views/partials/footer.php'); ?>