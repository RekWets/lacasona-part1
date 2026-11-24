<?php include('php/views/partials/header.php'); ?>
			<div class="container rounded shadow">
				<h3 class="title">Reportes</h3>
				<hr>
				<div class="row">
					<a href="?" class="btn">Regresar al inicio</a>
					<br><br>
					<div class="filter">
						<form action="?route=reports&method=pdf" method="POST" autocomplete="off" target="_blank">
							<div class="form">
								<div class="cantidad">
									<label for="reporte">Reporte de:</label>
									<select name="reporte" id="reporte">
										<option value="E">Estudiantes</option>
										<option value="M">Materias</option>
									</select>
								</div>
								<div id="first-filter">
									<label for="tipo">Tipo de reporte:</label>
									<select name="tipo" id="tipo">
										<option value="G">General</option>
										<option value="I">Individual</option>
									</select>
								</div>
								<div id="second-filter">
									<label for="dato1">Dato</label>
									<input type="text" name="dato1" id="dato1">
								</div>
								<button class="btn btn-primary">Generar</button>
							</div>
						</form>
					</div>
				</div>
			</div>
<?php include('php/views/partials/footer.php'); ?>