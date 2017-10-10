<?php 
	include("connection.php");
	session_start();
	$user_id=$_SESSION['user'];
	
	$sql_query="SELECT COUNT(*) FROM libros WHERE id_usuario='$user_id'";
	$result=$dbConnection->query($sql_query);
	$row = $result->fetch_row();
	$totalBooks = $row[0];

	if ($totalBooks != 0) {
		$sql_query="SELECT COUNT(*) FROM libros WHERE leido='Yes' AND id_usuario='$user_id'";
		$result=$dbConnection->query($sql_query);
		$row = $result->fetch_row();
		$readBooks = $row[0];

		$noReadBooks = $totalBooks-$readBooks;

		$pRead = ($readBooks * 100)/$totalBooks;
		$pNoRead = ($noReadBooks * 100)/$totalBooks;
	}else{
		$pRead = 0;
		$pNoRead = 0;
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
							<li><a href="selectBook.php">Recomendación</a></li>
							<li  class="active"><a href="#">Estadísticas</a></li>
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
				<div class="col-md-12">
					<h4>Leído:</h4>
					<div class="progress">
						
						<div class="progress-bar progress-bar-info" role="progressbar" <?php echo "style=\"width: $pRead%;\"  " ?>">
							<?php echo $pRead."%"?>
						</div>
						<span class="sr-only"><?php echo $pRead."%"?></span>
					</div>

					<h4>No Leído:</h4>
					<div class="progress">
						<div class="progress-bar progress-bar-danger" role="progressbar" <?php echo "style=\"width: $pNoRead%;\"  " ?>">
							<?php echo $pNoRead."%"?>
						</div>
						<span class="sr-only"><?php echo $pNoRead."%"?></span>
					</div>
				</div>
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