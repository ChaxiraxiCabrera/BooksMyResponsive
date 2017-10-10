<?php 
	include("connection.php");
	session_start();
	$user_id=$_SESSION['user'];
	$sql_query="SELECT * FROM libros WHERE id_usuario='$user_id'";
	$results=$dbConnection->query($sql_query);	
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
						<a href="userPage.php" class="navbar-brand">BooksMy</a>
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
							<li><a href="selectBook.php">Recomendación</a></li>
							<li><a href="statistics.php">Estadísticas</a></li>
							<li class="dropdown active">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button">
									Lecturas
									<span class="caret"></span>
								</a>
								<ul class="dropdown-menu" role="menu">
									<li><a href="reading.php">Actuales</a></li>
									<li class="divider"></li>
									<li><a href="histReading.php">Historial</a></li>
								</ul>
							</li>
						</ul>
						
						<ul class="nav navbar-nav navbar-right">
							<li><a href="logout.php"><span class="glyphicon glyphicon-log-in"> Cerrar Sesión</span></a></li>
						</ul>
					</div>
				</div>
			</nav>
		</header>

		<section class="jumbotron">
			<div class="container">
				<h1 class="titulo-blog">BooksMy</h1>
				<p>Bienvenido usuario: <i><?php echo $_SESSION['nameUser']?></i></p>
			</div>
		</section>

		<section class="main container">
			<div class="row">
				<div class="miga-de-pan">
					<ol class="breadcrumb">
						<li><a href="userPage.php">Inicio</a></li>
						<li>Lecturas</li>
						<li class="active">Actuales</li>
					</ol>
				</div>

				<form action="saveReading.php" class="form-inline" method="POST">
					<div class="form-group">
					  <label for="sel1">Seleccionar libro:</label>
					  <select class="form-control" id="sel1" name="sel1">
					  	<?php 
								foreach ($results as $result) {
						?>
					    <option value="<?php echo $result['id_libro']; ?>"><?php echo $result['nombre']; ?></option>
					    <?php  
							} 
							mysqli_close($dbConnection);
						?>
					  </select>
					</div>

					<button class="btn btn-primary">Comenzar lectura</button>
				</form>
			</div>

			<br>
			<div class="table-responsive">
					<table class="table table-bordered table-hover">
						<tr class="info">
							<th>Libro</th>
							<th>Inicio</th>
							<th>Fin</th>
						</tr>
						<?php 
							include("connection.php");
							
							$sql_query="SELECT lecturas.id_lectura, libros.nombre, lecturas.inicio FROM lecturas INNER JOIN libros ON lecturas.id_libro=libros.id_libro and lecturas.id_usuario='$user_id' and lecturas.terminado='No'";
							$results=$dbConnection->query($sql_query);	
							foreach ($results as $result) {
						?>
						<tr>
							<td><?php echo $result['nombre']; ?></td>
							<td><?php echo $result['inicio']; ?></td>
							<td align="center"><a href="endReading.php?reading_id=<?php echo $result['id_lectura']; ?>"><button type="button" class="btn btn-danger">Acabar</button></a></td>
						</tr>
						<?php  
							} 
							mysqli_close($dbConnection);
						?>
					</table>
				</div>
		</section>


		<footer>
			<div class="container">
				<div class="row">
					<div class="col-xs-6">
						<p>&copy; 2017</p>
					</div>
				</div>
			</div>
		</footer>
	<!-- BOOTSTRAP JAVASCRIPT-->
		<script type="text/javascript" src="js/jquery.js"></script>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
	</body>
</html> 