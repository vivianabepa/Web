<?php
	//Incluyo el database y realizo la conexión
	include_once("includes/database.php");
	$host="localhost";
	$user="root";
	$password="";
	$dbname="estudiantes_web";
	$con=mysqli_connect($host,$user,$password,$dbname);

	//Inicializo variables con la información que recibe por la url
	$codigo = $_GET["cod"];
	$nombre = $_GET["name"];

	//query para seleccionar el nombre del codigo que recibe por la url
	$selecNombre = "SELECT estudiantes.Nombre FROM estudiantes_web.estudiantes WHERE estudiantes.Codigo = $codigo";
	$resultNombre = mysqli_query($con,$selecNombre);

	//Escribo el título de la página junto con el nombre del usuario seleccionado
	while($row = mysqli_fetch_array($resultNombre)){
		echo "<h1>Perfil de ".$row['Nombre']."</h1>";
		echo "<br/>";
		//Creo un link para volver a la página de usuarios
		echo "<h3><a href= 'http://localhost/AndreaCastaneda_U1/Taller1/usuarios.php?name=".$nombre."'>Regresar al la lista de usuarios</a></h3>";
	}

	//query que selecciona las tareas correspondientes al usuario del perfil
	$queryTareas = "SELECT * FROM estudiantes_web.tareas WHERE tareas.Codigo = $codigo ORDER BY FechaFn";
	$resultTareas = mysqli_query($con,$queryTareas);

	echo "<br/><br/><br/>";

	//Armo la tabla
	echo "<table border=1 cellpadding=5 cellspacing=0>";
	//Nombre de la tabla y de los campos
	 echo "<tr>
	         <th colspan=5> Lista de Tareas </th>
		       <tr>
		         <th> Inicio </th>
		         <th> Fin </th>
		         <th> Prioridad </th>
		         <th> Tarea </th>
		         <th> Descripcion </th>
		   		</tr>";

		     //Lleno los campos con los datos recolectados del query
			while($row = mysqli_fetch_array($resultTareas)){
				echo "<tr>";     
				echo "<td align='center'>".$row['FechaIn']."</td>";
		     	echo "<td> $row[FechaFn]"."</td>";
		     	echo "<td> $row[Prioridad]</td>";	
		     	echo "<td> $row[Tarea]</td>";
		     	echo "<td> $row[Descripcion]</td>";
			 	echo"</tr>";
			}
	echo "</table>";

	?>