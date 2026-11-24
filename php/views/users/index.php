<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow p-5">
				<h3 class="title">Usuarios</h3>
				<hr>
				<div class="container">
					<a href="?route=user&method=create" class="btn btn-primary">Crear Usuario</a>
					<a href="?" class="btn">Regresar al inicio</a>
					<br><br>
				<!-- 	<div class="filter">
						<form action="?route=student&method=filter" method="POST">
							<div class="row">
								<div class="col-md-2 form-group">
									<label for="cantidad"># Filtros</label>
									<select name="cantidad" id="cantidad" class="form-control">
										<option>1</option>
										<option>2</option>
									</select>
								</div>
								<div id="first-filter" class="form-group col-md-2">
									<label for="filtro1">Filtrar por:</label>
									<select name="filtro1" id="filtro1" class="form-control">
										<option value="cedula">Cédula</option>
										<option value="nombres">Nombre</option>
										<option value="apellidos">Apellido</option>
										<option value="materia">Materia</option>
									</select>

								</div>
								<div class="col-md-2 form-group">
									<label for="dato1">Dato#1</label>
									<input type="text" name="dato1" id="dato1" class="form-control">
								</div>
								<div id="second-filter" class="form-group col-md-2">
									<label for="accion">Acción</label>
									<select name="accion" id="accion" class="form-control">
										<option value="AND">Y</option>
										<option value="OR">Ó</option>
									</select>
								</div>
								<div class="col-md-2 form-group">
									<label for="filtro2">Filtrar por:</label>
									<select name="filtro2" id="filtro2" class="form-control">
										<option value="cedula">Cédula</option>
										<option value="nombres">Nombre</option>
										<option value="apellidos">Apellido</option>
										<option value="materia">Materia</option>
									</select>
								</div>
								<div class="col-md-2 form-group">
									<label for="dato2">Dato#1</label>
									<input type="text" name="dato2" id="dato2" class="form-control">
								</div>
								<div class="my-2"></div>
								<hr>
								<button class="btn btn-primary">Buscar</button>
							</div>
						</form>
					</div> -->
				</div>
				<table class="table table-bordered">
					<thead>
						<th>nombre</th>
						<th>email</th>
						<th></th>
					</thead>
					<tbody>
						<?php if(!empty($users)){ ?>
							<?php foreach($users as $key){ ?>
								<tr>
									<td><?php echo $key['nombre']; ?></td>
									<td><?php echo $key['usuario']; ?></td>
									<td>
										<a href="?route=user&method=edit&id=<?php echo $key['id']; ?>" class="btn btn-warning">Editar</a>
										<a href="?route=user&method=delete&id=<?php echo $key['id']; ?>" class="btn btn-danger">Eliminar</a>
									</td>
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
			</div>
<?php include('php/views/partials/footer.php'); ?>