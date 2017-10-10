<?php 
	include("connection.php");
	session_start();

	$user_id = $_SESSION['user'];

	$sql_query="SELECT * FROM libros WHERE id_usuario='$user_id' AND leido='NO'";
	$results=$dbConnection->query($sql_query);
	
	$book_array = array();

	foreach ($results as $result) {
		array_push($book_array, $result['nombre']);
	}

	if (count($book_array) == 0) {
		array_push($book_array, "No tiene libros registrados");
	}
?>

<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
		<title>BooksMy</title>
		<!--BOOTSTRAP-->
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/estilos.css">
	</head>
	<body data-spy="scroll" data-target="#navegacion">
		<header>
			<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navegacion-fm">
							<span class="sr-only">Desplegar/Ocultar Menu</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="#" class="navbar-brand">BooksMy</a>
					</div>
					<!-- Inicia Menu-->
					<div class="collapse navbar-collapse" id="navegacion-fm">
						<ul class="nav navbar-nav">
							<li><a href="userPage.php">Inicio</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Listas
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="bookList.php">Libros Registrados</a></li>
									<li class="divider"></li>
									<li><a href="bookReadList.php">Libros Leídos</a></li>
									<li><a href="bookNoReadList.php">Libros no Leídos</a></li>
								</ul>
							</li>
							<li><a href="bookForm.php">Añadir Libro</a></li>
							<li class="active"><a href="selectBook.php">Recomendación</a></li>
							<li><a href="statistics.php">Estadísticas</a></li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"> Cerrar Sesión</span></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<section class="main container">
			<h2 align="center">Libro recomendado: <?php  echo $book_array[array_rand($book_array)]; ?></h2>
			<div class="contenedor-botones">
				<a href="selectBook.php" class="btn btn-primary">Nueva recomendación</a>
			</div>
		</section>


		<footer>
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<p>&copy; 2017</p>
					</div>
					<div class="col-xs-6">
						<ul class="list-inline text-right">
							<li><a href="#">Incio</a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
	<!-- BOOTSTRAP JAVASCRIPT-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html> 