<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow my-3 p-3">
				<h3 class="title">Trabajadores - Registro - <a href="?route=worker&method=index" class="btn">Regresar</a></h3>
				<hr>
				<div class="container p-2">
					<form action="?route=worker&method=save" method="POST">
						<!-- action="?route=student&method=save" -->
						<h4>Formulario del Trabajador</h4>
						<hr>
						<br>
						<div class="row">
							<div class="form-group col-md-3">
								<label for="cedula"><b>Cédula</b> *</label>
								<input required type="text" name="cedula" class="form-control" placeholder="Ejem:12334567">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="nombre"><b>Nombre</b> *</label>
								<input required type="text" name="nombre" class="form-control" 	placeholder="Ejem: Raúl...">
							</div>
							<div class="form-group col-md-4">
								<label for="apellido
								"><b>Apellido</b> *</label>
								<input required type="text" name="apellido" class="form-control" 	placeholder="Ejem: Fernandez...">
							</div>
							<div class="form-group col-md-4">
								<label for="fecha_nacimiento"><b>Fecha de Nacimiento</b> *</label>
								<input required type="date" name="fecha_nacimiento" class="form-control">
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-12">
								<label for="nombre"><b>Dirección</b> *</label>
								<textarea name="direccion" class="form-control" 	placeholder="Dirección..." required></textarea>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-4">
								<label for="edad"><b>Edad</b> *</label>
								<input required type="text" name="edad" class="form-control" 	placeholder="Edad...">
							</div>
							<div class="form-group col-md-4">
								<label for="area"><b>Área</b> *</label>
								<select required name="area" class="form-control">
									<option>RRHH</option>
									<option>Compras</option>
									<option>Comercialización</option>
									<option>Presupuesto</option>
								</select>
							</div>
							<div class="form-group col-md-4">
								<label for="estadoo"><b>Estatus</b> *</label>
								<select required name="estado" class="form-control">
									<option>Activo</option>
									<option>Inactivo</option>
								</select>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="form-group col-md-6">
								<label for="edad"><b>Correo Electrónico</b> *</label>
								<input required type="email" name="email" class="form-control" 	placeholder="micorreo@email.com">
							</div>
							<div class="form-group col-md-6">
								<label for="telefono"><b>Teléfono</b> *</label>
								<input required type="text" name="telefono" class="form-control" 	placeholder="04261234567...">
							</div>
							
						</div>
						<hr>
						<input type="hidden" name="route" value="worker">
						<input type="hidden" name="method" value="save">

						<button class="btn btn-success"><i class="bi-check"></i> Registrar Trabajador</button>
					</form>
				</div>
			</div>
<?php include('php/views/partials/footer.php'); ?>