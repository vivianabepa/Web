<?php
	include_once("includes/database.php");
	$varA="Web bitch";
	$varB="Yeah";
	$varC=5;
	echo "<h1>soy un archivo php</h1>";
	echo "<br/><br/><br/>";
	echo $varA." ".$varB;
	echo "<br/><br/><br/>";
	echo "Si estudian van a sacar ".$varC;

	$host="localhost";
	$user="root";
	$password="";
	$dbname="estudiantes_web";
	$con=mysqli_connect($host,$user,$password,$dbname);
	$query="SELECT * FROM estudiantes_web.estudiantes";
	$result=mysqli_query($con,$query);

	echo "<br/><br/><br/>";
	
	//print_r($result);
	while($row=mysqli_fetch_array($result)){
		echo $row["Codigo"]." ".$row["Nombre"]." ".$row["Apellido"]." ".$row["Correo"]."<br/>";
	}
	?>