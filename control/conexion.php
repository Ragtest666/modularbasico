<?php
	$servidor="195.179.238.52";
	$usuario="u765983389_root";
	$contrasena="Modul@r1";
	$base="u765983389_PanaderiaDB";

	$conexion=mysqli_connect("$servidor","$usuario","$contrasena") or die(mysqli_error());
	mysqli_query($conexion, "SET NAMES 'utf8'");
	$base=mysqli_select_db($conexion, $base) or die(mysqli_error());
	

?>