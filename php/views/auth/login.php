<?php include('php/views/partials/header.php'); ?>
<div class="my-4"></div>
<section class="container shadow p-5">
	<div class="row">
		<div class="col-md-6">
			<h4><i class="bi-person-circle"></i> Iniciar sesión </h4>
			<hr>
			<?php if(isset($data['msj'])){ ?>
				<div class="row">
					<div class="col-md-12">
						<div class="alert alert-danger">
							<p><i class="bi-x-lg"></i> <?php echo $data['msj']; ?> </p>
						</div>
					</div>
				</div>
			<?php } ?>
			<form action="?route=auth&method=login-in" method="POST">
				<div class="form-group">
					<label for="">Correo Electrònico</label>
					<input type="email" class="form-control" required placeholder="nombre@mail.com" name="email">
				</div>
				<div class="my-2"></div>
				<div class="form-group">
					<label for="">Contraseña</label>
					<input type="password" class="form-control" required placeholder="Contraseña" name="password">
				</div>
				<hr>
				<button class="btn btn-primary w-100">
					<i class="bi-patch-check"></i> 
					Ingresar

				</button>
			</form>
		</div>
		<div class="col-md-6 text-center" >
			<img src="img/1.png" alt="" class="w-100">
			<p class="text-muted"><i>Sistema de control de asistencia laboral</i></p>
		</div>
	</div>

</section>
<div class="my-4"></div>

<?php include('php/views/partials/footer.php'); ?>