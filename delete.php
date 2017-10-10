<?php
	include("connection.php");

	$book_id=$_GET['book_id'];

	if($book_id>0){
		//Borrar datos	
		$delete_sql="DELETE FROM libros WHERE id_libro='$book_id'";
		$dbConnection->query($delete_sql);
		if($dbConnection->errno) die($dbConnection->error);
	}
	mysqli_close($dbConnection);

?>

<script language = javascript>
	alert("El libro ha sido borrado")
	self.location="userPage.php";
</script>