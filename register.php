<?php
	include("connection.php");

	$userName = $_POST['user'];
	$pass1 = $_POST['pwd1'];
	$pass2 = $_POST['pwd2'];

	if ($pass1 == $pass2) {
		//Insert data
		$encPass = md5($pass1);
		$insert_sql="INSERT INTO usuarios SET nombre='$userName', password='$encPass'";
		$dbConnection->query($insert_sql);
		if($dbConnection->errno) die($dbConnection->error);

		?>
		<script language = javascript>
			alert("Los datos han sido guardados correctamente")
			self.location="index.html";
		</script>
	<?php
	}else{ ?>
		<script language = javascript>
			alert("Las contraseñas son distintas")
			self.location="sign-up.html"
		</script>
	<?php
	}

	mysqli_close($dbConnection);

?>