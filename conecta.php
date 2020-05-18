<?php
	$mysqli = new mysqli('localhost','root','','APS_DSW');
	mysqli_set_charset($mysqli, "utf8");
	
	if (mysqli_connect_error()) {
		echo "ERRO DE CONEXÃO !";
		die('Connect Error (' . mysqli_connect_errno() . ') '. mysqli_connect_error());
	}
?>