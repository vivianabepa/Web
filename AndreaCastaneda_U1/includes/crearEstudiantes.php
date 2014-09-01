<?php
	include_once("database.php");

	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$codigo = $_POST["codigo"];
	$correo = $_POST["correo"];
	//echo "Mi nombre es ".$nombre;

	$query = "INSERT INTO estudiantes_web.estudiantes (Codigo, Nombre, Apellido, Correo) VALUES ('$codigo','$nombre','$apellido','$correo')";
	$result=mysqli_query($con,$query);
	
	header('Location: http://localhost/AndreaCastaneda_U1/estudiantes.php')

?>