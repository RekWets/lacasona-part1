<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow my-3 p-3">
				<h3 class="title">Usuarios - Registro - <a href="?route=worker&method=index" class="btn">Regresar</a></h3>
				<hr>
				<div class="container p-2">
					<form action="?route=user&method=save" method="POST">
						<h4>Formulario de usuario</h4>
						<hr>
						<br>
						<div class="row">
							<div class="form-group col-md-3">
								<label for="nombre">Nombre de Usuario</label>
								<input type="text" name="nombre" class="form-control" placeholder="Ejem:Jose">
							</div>
							<div class="form-group col-md-3">
								<label for="email">Correo Electrónico</label>
								<input type="text" name="email" class="form-control" 	placeholder="Ejem: mimail@mail.com" required>
							</div>
							<div class="form-group col-md-3">
								<label for="password">Contraseña</label>
								<input type="password" name="password" class="form-control" required>
							</div>
							<div class="form-group col-md-3">
								<label for="password">Rol</label>
								<select name="rol" id="rol" class="form-control">
									<option>Usuario</option>
									<option>Administrador</option>
								</select>
							</div>
							
						</div>
						<hr>
						<button class="btn btn-success"><i class="bi-check"></i> Registrar usuario</button>
					</form>
				</div>
			</div>
<?php include('php/views/partials/footer.php'); ?>