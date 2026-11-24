<?php 
@session_start();
if(isset($_SESSION) && !empty($_SESSION)){
	$sa = true;
}
?>

<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>La Casona</title>
		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
		<style>	
		.fondo{
			background-image: url("img/2.png");
			padding: 400px 100px;
			text-align: center;
			background-position: center center;
			background-size: cover;
			background-repeat: no-repeat;
			position: relative;
		}

		.fondo:before{
			content:'';
			position: absolute;
		    top: 0;
			bottom: 0;
			left: 0;
			right: 0;
			background-color: rgba(0,0,0,0.5);
		}

		.newsletter-column{
			max-height: 400px;
			overflow: scroll;
			overflow-x: hidden;

		}

		.services-column{
			max-height: 400px;
			overflow: scroll;
			overflow-x: hidden;
		}

		body{
			overflow-x: hidden;
		}
		</style>			
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="padding:0;">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="#">LA CASONA</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarText">
			      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style="padding:0; margin:0;">
			        <li class="nav-item">
			          <a class="nav-link active" aria-current="page" href="?"><i class="bi-house"></i> Inicio</a>
			        </li>
			        <li class="nav-item">
			          <a class="nav-link" href="#">|</a>
			        </li>
				  	<?php if(isset($sa) AND !empty($sa)){  ?>
				  		<li class="nav-item dropdown">
				          <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
				            <i class="bi-person-circle"></i> <?php echo $_SESSION['data']['nombre']; ?>
				          </a>
				          <ul class="dropdown-menu">
				          	<?php if($_SESSION['data']['rol'] == "Administrador"){?>
				            <li><a class="dropdown-item" href="?route=user&method=index"><i class="bi-person-circle"></i> Usuarios</a></li>
					        <li class="nav-item">
					          <a class="dropdown-item" href="?route=worker&method=index"><i class="bi-people-fill"></i> Trabajadores</a>
					        </li>
					        <li class="nav-item">
					          <a class="dropdown-item" href="?route=history&method=index"><i class="bi-clock"></i> Historial</a>
					        </li>
				            <li><hr class="dropdown-divider"></li>
					    	<?php } ?>
				            <li><a class="dropdown-item" href="?route=auth&method=login-out"><i class="bi-upload"></i> Salir</a></li>
				          </ul>
				        </li>
			    	<?php }else{ ?>
			    		<li class="nav-item">
			        		<a href="?route=auth&method=login" class="btn nav-link text-white"><i class="bi-person-circle"></i> Iniciar seisón</a>
			        	</li>
			    	<?php } ?>

			      </ul>
			      
			    </div>
			  </div>
			</nav>
		</header>
		<section class="content">