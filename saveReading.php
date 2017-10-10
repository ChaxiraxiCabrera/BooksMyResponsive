<?php
	session_start();
	include("connection.php");

	$book_id=$_POST['sel1'];
	$user = $_SESSION['user'];
	$date = date("Y-m-d H:i:s");

	//insert data
	$insert_sql="INSERT INTO lecturas SET id_libro='$book_id', id_usuario='$user', inicio='$date', terminado='No'";
	$dbConnection->query($insert_sql);
	if ($dbConnection->errno) die($dbConnection->errno);
	mysqli_close($dbConnection);
?>
<script language = javascript>
	alert("Se ha guardado correctamente la lectura")
	self.location="reading.php";
</script>