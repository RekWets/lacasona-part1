<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow my-3 p-3">
				<h3 class="title">Usuarios - Editar Registro - <a href="?route=worker&method=index" class="btn">Regresar</a></h3>
				<hr>
				<div class="container p-2">
					<form action="?route=user&method=update" method="POST">
						<h4>Formulario de usuario</h4>
						<hr>
						<br>
						<div class="row">
							<div class="form-group col-md-3">
								<label for="nombre">Nombre de Usuario</label>
								<input type="text" name="nombre" class="form-control" placeholder="Ejem:Jose" value="<?php echo $m['nombre']; ?>" required>
							</div>
							<div class="form-group col-md-3">
								<label for="email">Correo Electrónico</label>
								<input type="text" name="email" class="form-control" 	placeholder="Ejem: mimail@mail.com" required value="<?php echo $m['usuario']; ?>">
							</div>
							<div class="form-group col-md-3">
								<label for="password">Contraseña</label>
								<input type="password" name="password" class="form-control" required value="<?php echo $m['password']; ?>">
							</div>
							<div class="form-group col-md-3">
								<label for="password">Rol</label>
								<select name="rol" id="rol" class="form-control">
									<option><?php echo $m['rol']; ?></option>
									<option>Usuario</option>
									<option>Administrador</option>
								</select>
							</div>
						</div>
						<hr>
						<input type="hidden" name="old" value="<?php echo $m['id']; ?>">
						<button class="btn btn-primary"><i class="bi-check"></i> Actualizar usuario</button>
					</form>
				</div>
			</div>
<?php include('php/views/partials/footer.php'); ?>