<?php
	$servidor="localhost";
	$usuario="root";
	$contrasena="";
	$base="PanaderiaDB";

	$conexion=mysqli_connect("$servidor","$usuario","$contrasena") or die(mysqli_error());
	mysqli_query($conexion, "SET NAMES 'utf8'");
	$base=mysqli_select_db($conexion, $base) or die(mysqli_error());
?>