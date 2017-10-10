<?php
	include("connection.php");
	$title="Añadir nuevo libro";
	$book_id=0;
	$name="";
	$author="";
	$saga="";
	$nPag="";
	$read="";
	if(isset($_GET['book_id'])){
		$title="Modificar libro";
		$book_id=$_GET['book_id'];
		$book_query="SELECT * FROM libros WHERE id_libro='$book_id'";
		$results=$dbConnection->query($book_query);
		foreach ($results as $book_row) {
			$name=$book_row['nombre'];
			$author=$book_row['autor'];
			$saga=$book_row['saga'];
			$nPag=$book_row['paginas'];
			$read=$book_row['leido'];
		}
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
							<li class="active"><a href="#">Añadir Libro</a></li>
							<li><a href="selectBook.php">Recomendación</a></li>
							<li><a href="statistics.php">Estadísticas</a></li>
							<li class="dropdown">
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

		<section class="main container">
			<h2 align="center"><?php echo $title ?></h2>
			<form action="registerBook.php" method="POST">
			  <div class="form-group">
			    <label for="name">Nombre*:</label>
			    <input type="text" class="form-control" id="name" name="bookName" required="required" placeholder="Nombre Libro" value="<?php echo $name; ?>">
			  </div>
			  <div class="form-group">
			    <label for="author">Autor*:</label>
			    <input type="text" class="form-control" id="author" name="bookAuthor" required="required" placeholder="Nombre Autor" value="<?php echo $author; ?>">
			  </div>
			  <div class="form-group">
			    <label for="saga">Saga:</label>
			    <input type="text" class="form-control" id="saga" name="bookSaga" placeholder="Nombre Saga" value="<?php echo $saga; ?>">
			  </div>
			  <div class="form-group">
			    <label for="pag">Nº Páginas:</label>
			    <input type="number" class="form-control" id="pag" name="bookPages" value="<?php echo $nPag; ?>">
			  </div>
			  <div class="form-group">
			  	<label>Leído:</label>
				<div class="radio-inline">
					<label for="radio1">
						<input type="radio" name="read" id="radio1" value="Yes" <?php if($read=="Yes"){ ?> checked="checked" <?php } ?>>Si
					</label>
				</div>
				<div class="radio-inline">
					<label for="radio2">
						<input type="radio" name="read" id="radio2" value="No" <?php if($read=="No"){ ?> checked="checked" <?php } ?>>No
					</label>
				</div>
			  </div>

			  <input type="hidden" name="id_libro" value="<?php echo $book_id; ?>">
			  
			  <button type="submit" class="btn btn-primary">Enviar Datos</button>
			  <p>* Campos obligatorios.</p>
			</form>
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