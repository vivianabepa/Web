<htm>
<head>
	<title>Notas de estudiantes</title>
	<!--<meta charset = "utf-8">-->
</head>
<body>
	<?php
	include_once("includes/database.php");
	$host="localhost";
	$user="root";
	$password="";
	$dbname="estudiantes_web";
	$con=mysqli_connect($host,$user,$password,$dbname);
	$query="SELECT * FROM estudiantes_web.estudiantes ORDER BY Apellido";
	$result=mysqli_query($con,$query);

	echo "<br/><br/><br/>";
	
	//print_r($result);
	while($row=mysqli_fetch_array($result)){
		echo "<a href='http://localhost/AndreaCastaneda_U1/notasEstudiantes.php?Codigo='>".$row["Codigo"]."</a>"." ".$row["Nombre"]." ".$row["Apellido"]." ".$row["Correo"]."<br/>";
	}
	?>

	<a href="#"></a>

	<h1>Crea un nuevo estudiante</h1>
		<form action="includes/crearEstudiantes.php" method="POST">
			<label>Nombre</label><input type="text" name="nombre"></input><br>
			<label>Apellido</label><input type="text" name="apellido"></input><br>
			<label>Codigo</label><input type="text" name="codigo"></input><br>
			<label>Correo</label><input type="text" name="correo"></input><br>
			<input type="submit" name="Enviar">
		</form>		
</body>
