<?php
	//Incluyo el database y realizo la conexión
	include_once("includes/database.php");
	$host="localhost";
	$user="root";
	$password="";
	$dbname="estudiantes_web";
	$con=mysqli_connect($host,$user,$password,$dbname);
	
	//query para tomar los nommbres de las notas
	$nombresNotas = "SELECT Nombre FROM estudiantes_web.notas WHERE 1";   //para pedir recorrer todas las notas que existen
	$resultB = mysqli_query($con,$nombresNotas);

	//Armo un arreglo con el nombre de las notas
	$talleres=[];
	while($row=mysqli_fetch_array($resultB)){
		array_push($talleres, $row["Nombre"]);
	}
	print_r($talleres);

	//Este es el código que utilizé antes para el query de la tabla de las notas
	/*$query="SELECT estudiantes.Nombre AS Estudiante,
		sum(if(notas.Nombre='Taller1', notas_estudiantes.Valor_Nota,0)) AS 'Taller1',
		sum(if(notas.Nombre='Taller2', notas_estudiantes.Valor_Nota,0)) AS 'Taller2',
		sum(if(notas.Nombre='Taller3', notas_estudiantes.Valor_Nota,0)) AS 'Taller3'
		FROM notas_estudiantes 
		JOIN estudiantes ON notas_estudiantes.Codigo = estudiantes.Codigo 
		JOIN notas ON notas_estudiantes.IDNota = notas.IDNota
		GROUP by Estudiante";*/

	//Armo el query para recolectar los datos para mostrar en la tabla
	$query = "SELECT estudiantes.Nombre,";
	//Recorro el arreglo de nombres y agrego al query
	for ($i=0; $i < sizeof($talleres); $i++) { 
		$query.=" sum( if( notas.Nombre='".$talleres[$i]."', notas_estudiantes.Valor_Nota, 0) ) ".$talleres[$i].",";
	}
	//Retiro la coma (,) del último sum
	$query = substr_replace($query, "", -1);
	//Agrego los JOIN al query
	$query.=" FROM estudiantes_web.estudiantes JOIN estudiantes_web.notas_estudiantes ON estudiantes.Codigo = notas_estudiantes.Codigo JOIN estudiantes_web.notas ON notas_estudiantes.IDNota = notas.IDNota";
	$query.=" GROUP BY estudiantes.Nombre"; 

	$result=mysqli_query($con,$query);

	echo "<br/><br/><br/>";

	//Codigo para buscar desde la url -- Me aparece un error en el While (linea 76)
	if(isset($_GET["Nombre"])){
		//Realizo un query para sacar los datos del nombre que llega por la url
        $queryB = "SELECT estudiantes.Nombre,";
        $nombreEst = $_GET["Nombre"];
        for ($i=0; $i < sizeof($talleres); $i++) { 
			$queryB.=" sum( if( notas.Nombre='".$talleres[$i]."', notas_estudiantes.Valor_Nota, 0) ) ".$talleres[$i].",";
		}
		$queryB = substr_replace($query, "", -1);
		$queryB.=" FROM estudiantes_web.estudiantes JOIN estudiantes_web.notas_estudiantes ON estudiantes.Codigo = notas_estudiantes.Codigo JOIN estudiantes_web.notas ON notas_estudiantes.IDNota = notas.IDNota";
		$queryB.=" WHERE Nombre =".$nombreEst; 

		$resultBusqueda=mysqli_query($con,$queryB);

		//Dibujo una tabla con los datos que obtiene
        echo "<table border=1 cellpadding=4 cellspacing=0>";
		//Nombre de la tabla y de los campos
		 echo "<tr>
		         <th colspan=5> Notas Estudiantes </th>
			       <tr>
			         <th> Nombre </th>
			         <th> Taller 1 </th>
			         <th> Taller 2 </th>
			         <th> Taller 3 </th>
			         <th> Taller 4 </th>
			   		</tr>";

			     //Lleno los campos con los datos recolectados del query
			   	 //Aquí me aparece un error pero no pude identificar cual era...
				while($row = mysqli_fetch_array($resultBusqueda)){
					echo "<tr>";     
			     	echo "<td align='center'> $row[Nombre] </td>";
			     	for ($i=0; $i < sizeof($talleres); $i++) { 
						echo "<td>";
						echo $row[$talleres[$i]];
						echo "</td>";
					}
				 	echo"</tr>";
				}
		echo "</table>";
    }else {
        echo "Notas de estudiantes.......";
    }

	echo "<br/><br/><br/>";

	//Armo la tabla
	echo "<table border=1 cellpadding=4 cellspacing=0>";
	//Nombre de la tabla y de los campos
	 echo "<tr>
	         <th colspan=5> Notas Estudiantes </th>
		       <tr>
		         <th> Nombre </th>
		         <th> Taller 1 </th>
		         <th> Taller 2 </th>
		         <th> Taller 3 </th>
		         <th> Taller 4 </th>
		   		</tr>";

		     //Lleno los campos con los datos recolectados del query
			while($row = mysqli_fetch_array($result)){
				echo "<tr>";     
		     	echo "<td align='center'> $row[Nombre] </td>";
		     	for ($i=0; $i < sizeof($talleres); $i++) { 
					echo "<td>";
					echo $row[$talleres[$i]];
					echo "</td>";
				}
			 	echo"</tr>";
			}
	echo "</table>";

	?>