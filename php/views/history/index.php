<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow p-5">
				<h3 class="title">Historial de Asistencias</h3>
				<hr>
				<div class="container">
					<a href="?" class="btn"><i class="bi-arrow-left"></i> Regresar al inicio</a>
					<br><br>
					<!-- <div class="filter">
						<form action="?route=worker&method=filter" method="POST">
							<div class="row">
								<div id="first-filter" class="form-group col-md-2">
									<label for="filtro1">Filtrar por:</label>
									<select name="filtro1" id="filtro1" class="form-control">
										<option value="cedula">Cédula</option>
										<option value="nombre">Nombre</option>
										<option value="apellido">Apellido</option>
									</select>

								</div>
								
								<div class="col-md-2 form-group">
									<label for="dato1">Dato</label>
									<input type="text" name="dato1" id="dato2" class="form-control">
								</div>
								<div class="col-md-2 form-group">
									<button class="btn btn-secondary my-4"><i class="bi-search">	</i> Buscar</button>
									
								</div>
							</div>
						</form>
					</div> -->
				</div>
				<hr>
				<table class="table table-bordered">
					<thead class="table-dark">
						<th>Fecha</th>
						<th>Trabajador</th>
						<th>Hora de Entrada</th>
						<th>Hora de Salida</th>
						<th></th>
					</thead>
					<tbody>
						<?php if(!empty($workers)){ ?>
							<?php foreach($workers as $key){ ?>
									
								<tr>
									<td><?php echo $key['fecha']; ?></td>
									<td><?php echo $key['nombre'] . " " . $key['apellido']; ?></td>
									<td><?php echo $key['hora_entrada']; ?></td>
									<td><?php echo $key['hora_salida']; ?></td>
								<!-- 	<td>
										<a href="?route=worker&method=edit&id=<?php echo $key['id']; ?>" class="btn btn-warning"><i class="bi-pencil"></i> Editar</a>
										<a href="?route=worker&method=delete&id=<?php echo $key['id']; ?>" class="btn btn-danger"><i class="bi-trash"></i> Eliminar</a>
									</td> -->
								</tr>
							<?php } ?>
						<?php } ?>
					</tbody>
				</table>
				
			</div>
<?php include('php/views/partials/footer.php'); ?>