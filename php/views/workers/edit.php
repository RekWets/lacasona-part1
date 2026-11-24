<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow my-3 p-3">
				<h3 class="title">Trabajadores - Registro - <a href="?route=worker&method=index" class="btn">Regresar</a></h3>
				<hr>
				<div class="container p-2">
					<form action="?route=worker&method=update" method="POST">
						<h4>Formulario del Trabajador</h4>
						<hr>
						<br>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="cedula"><b>Cédula</b> *</label>
								<input required type="text" name="cedula" class="form-control" placeholder="Ejem:12334567" value="<?php echo $s['cedula']; ?>">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="nombre"><b>Nombre</b> *</label>
								<input required type="text" name="nombre" class="form-control" 	placeholder="Ejem: Raúl..." value="<?php echo $s['nombre']; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="apellido_p"><b>Apellido</b> *</label>
								<input required type="text" name="apellido" class="form-control" 	placeholder="Ejem: Fernandez..." value="<?php echo $s['apellido']; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="fecha_nacimiento"><b>Fecha de Nacimiento</b> *</label>
								<input required type="date" name="fecha_nacimiento" class="form-control" value="<?php echo $s['fecha_nacimiento']; ?>">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="nombre"><b>Dirección</b> *</label>
								<textarea name="direccion" class="form-control" 	placeholder="Dirección..." required><?php echo $s['direccion']; ?></textarea>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="edad"><b>Edad</b> *</label>
								<input required type="text" name="edad" class="form-control" 	placeholder="Edad..." value="<?php echo $s['edad']; ?>">
							</div>
							<div class="form-group col-md-4">
								<label for="area"><b>Área</b> *</label>
								<select required name="area" class="form-control">
									<option><?php echo $s['area']; ?></option>
									<option>RRHH</option>
									<option>Compras</option>
									<option>Comercialización</option>
									<option>Presupuesto</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="estadoo"><b>Estatus</b> *</label>
								<select required name="estado" class="form-control">
									<option><?php echo $s['estado']; ?></option>
									<option>Activo</option>
									<option>Inactivo</option>
								</select>
							</div>
						</div>
						<hr>
						<input type="hidden" name="old" value="<?php echo $s['id']; ?>">

						<button class="btn btn-primary"><i class="bi-check"></i> Actualizar Trabajador</button>
					</form>
				</div>
			</div>
<?php include('php/views/partials/footer.php'); ?>