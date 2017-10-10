<?php
	include("connection.php");

	$reading_id=$_GET['reading_id'];
	$date = date("Y-m-d H:i:s");

	if($reading_id>0){
		//Actualizar datos
		$update_sql="UPDATE lecturas SET fin='$date', terminado='Yes'  WHERE id_lectura='$reading_id'";
		$dbConnection->query($update_sql);
		if($dbConnection->errno) die($dbConnection->error);
	}
	mysqli_close($dbConnection);

?>

<script language = javascript>
	alert("Se ha finalizado la lectura")
	self.location="reading.php";
</script>