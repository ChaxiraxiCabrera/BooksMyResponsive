<?php
	session_start();
	include("connection.php");

	$book_id=$_POST['id_libro'];
	$bookName = $_POST['bookName'];
	$bookAuthor = $_POST['bookAuthor'];
	$bookSaga = $_POST['bookSaga'];
	$bookPages = $_POST['bookPages'];
	$read = $_POST['read'];
	$user = $_SESSION['user'];

	if($book_id>0){
		//Update data
		$update_sql="UPDATE libros SET nombre='$bookName', autor='$bookAuthor', saga='$bookSaga', paginas='$bookPages', leido='$read' WHERE id_libro='$book_id'";
		$dbConnection->query($update_sql);
		if($dbConnection->errno) die($dbConnection->error);
	}else{
		//Check Data
		$sql_check = "SELECT * FROM libros WHERE nombre='$bookName' AND id_usuario='$user'";
		$results=$dbConnection->query($sql_check);
		$row = $results->fetch_array();
		if ($row) {
			?>
			<script language = javascript>
				alert("Este libro ya está registrado")
				self.location="bookForm.php";
			</script>

			<?php
		}else{
			//Insert data
			$insert_sql="INSERT INTO libros SET nombre='$bookName', autor='$bookAuthor', saga='$bookSaga', paginas='$bookPages', leido='$read', id_usuario='$user'";
			$dbConnection->query($insert_sql);
			if($dbConnection->errno) die($dbConnection->error);
		}
		
	}

	mysqli_close($dbConnection);

?>

<script language = javascript>
	alert("Los datos han sido guardados correctamente")
	self.location="bookForm.php";
</script>