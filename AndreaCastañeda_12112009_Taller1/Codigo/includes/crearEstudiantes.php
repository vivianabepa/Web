<?php
	include_once("database.php");

	//Regojo los datos de la url
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$codigo = $_POST["codigo"];
	$correo = $_POST["correo"];

	//query que inserta las variables en la base de datos de estudiantes
	$queryCreaU = "INSERT INTO estudiantes_web.estudiantes (Codigo, Nombre, Apellido, Correo) VALUES ('$codigo','$nombre','$apellido','$correo')";
	$result=mysqli_query($con,$queryCreaU);
	
	header("Location: http://localhost/AndreaCastaneda_U1/Taller1/usuarios.php?name=$nombre");

?>