<?php
//Esta página se encarga de agregar la tarea nueva a la base de datos
	include_once("database.php");

	$nombre =  $_GET["name"];

	//Recojo los datos recibidos por la url
	$codigo = $_POST["encargado"];
	$inicio = $_POST["inicio"];
	$fin = $_POST["fin"];
	$prioridad = $_POST["prioridad"];
	$tarea = $_POST["tarea"];
	$descripcion = $_POST["descripcion"];

	//query que inserta las variables en la base de datos de tareas
	$queryCrearT = "INSERT INTO estudiantes_web.tareas (Codigo, FechaIn, FechaFn, Prioridad, Tarea, Descripcion) VALUES ('$codigo','$inicio','$fin','$prioridad','$tarea','$descripcion')";
	$result=mysqli_query($con,$queryCrearT);

	echo "$inicio";
	
	header("Location: http://localhost/AndreaCastaneda_U1/Taller1/usuarios.php?name=$nombre");

?>