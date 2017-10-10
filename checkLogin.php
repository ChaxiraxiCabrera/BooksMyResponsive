<?php
	session_start();
	include("connection.php");

	$user = $_POST['user'];
	$pass = $_POST['pwd'];

	if(empty($user) || empty($pass)){
		header("Location:login.html");
		exit();
	}

	$sql="SELECT * FROM usuarios WHERE nombre='$user'";
	$result=$dbConnection->query($sql);
	$row = $result->fetch_array();

	if($row){
		if($row['password'] == md5($pass)){
			session_start();
			$_SESSION['user'] = $row['id_usuario'];
			header("Location:userPage.php");
		}else{
			?>
			<script language = javascript>
				alert("Login incorrecto");
				self.location="index.html";
			</script>
		<?php }
	}else{ ?>
		<script language = javascript>
				alert("Login incorrecto");
				self.location="index.html";
			</script>
	<?php }
	
	mysqli_close($dbConnection);
?>

