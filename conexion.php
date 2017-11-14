<?php
	function conexion()
	{
		$idCone = mysqli_connect("localhost","root","") or die("Error conectando al servidor");
		$db = "statium";
		mysqli_select_db($idCone,$db) or die("Error seleccionando la base de datos");
		return $idCone;
	}

?>