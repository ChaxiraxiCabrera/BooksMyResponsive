<?php
	$server="localhost";
	$dbUser="root";
	$dbPass="";
	$dbName="BooksMyDB";

	$dbConnection= new mysqli($server, $dbUser, $dbPass, $dbName);
	if($dbConnection->connect_errno>0){
		die("Imposible conectarse con la BD".$dbConnection->connect_errno);
	}
?>