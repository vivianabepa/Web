<?php
	//Incluyo el database y realizo la conexión
	include_once("includes/database.php");
	$host="localhost";
	$user="root";
	$password="";
	$dbname="estudiantes_web";
	$con=mysqli_connect($host,$user,$password,$dbname);

	//Recojo variables de la url
	$nombre = $_GET["name"];
	$nombreB = $_POST["name"];

	echo "<h1>Usuarios</h1>";
	if ($nombre != null){
		echo "<h2>Bienvenido(a)"." ".$nombre."</h2>";
	}
	if ($nombreB != null){
		echo "<h2>Bienvenido(a)"." ".$nombreB."</h2>";
	}

	//Formulario para crear una tarea nueva
	echo "<h3>Crea una tarea nueva</h3>";
	echo "<form action='includes/crearTarea.php?name=$nombre 'method='POST'>";
		echo "<label>Tarea</label><input type='text' name='tarea'></input><br>";
		echo "<label>Prioridad (Alta, Media, Baja)</label><input type='text' name='prioridad'></input><br>";
		echo "<label>Fecha Inicio</label><input type='date' name='inicio'></input><br>";
		echo "<label>Fecha Fin</label><input type='date' name='fin'></input><br>";
		echo "<label>Descripcion</label><input type='text' name='descripcion'></input><br>";
		echo "<label>Codigo del encargado</label><input type='text' name='encargado'></input><br>";
		echo "<input type='submit' name='Crear tarea'>";
	echo "</form>";
	
	//query para seleccionar los datos de los usuarios
	$queryUsuarios = "SELECT estudiantes.Nombre, estudiantes.Codigo AS CodEst, estudiantes.Apellido, estudiantes.Correo
			FROM estudiantes_web.estudiantes WHERE 1 ORDER BY Apellido"; 
	$result=mysqli_query($con,$queryUsuarios);

	echo "<br/><br/><br/>";
	echo "<h3>Lista de todos los usuarios a los que le puedes asignar tareas</h3>";

	//Armo la tabla
	echo "<table border=1 cellpadding=6 cellspacing=0>";
	//Nombre de la tabla y de los campos
	 echo "<tr>
	         <th colspan=3> Usuarios </th>
		       <tr>
		         <th> Codigo </th>
		         <th> Nombre </th>
		         <th> Correo </th>
		   		</tr>";

		     //Lleno los campos con los datos recolectados del query
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";     
				echo "<td align='center'>"."<a href='http://localhost/AndreaCastaneda_U1/Taller1/perfil.php?cod=".$row['CodEst']."&name=".$nombre."'>".$row['CodEst']."</a>"."</td>";
		     	echo "<td> $row[Nombre]"." ".$row['Apellido']."</td>";
		     	echo "<td> $row[Correo]</td>";	
			 	echo"</tr>";
			}
	echo "</table>";

	?>