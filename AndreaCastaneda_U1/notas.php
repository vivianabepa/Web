<?php
	include_once("includes/database.php");
	$host="localhost";
	$user="root";
	$password="";
	$dbname="estudiantes_web";
	$con=mysqli_connect($host,$user,$password,$dbname);
	$query="SELECT * FROM estudiantes_web.notas";
	$result=mysqli_query($con,$query);

	echo "<br/><br/><br/>";
	
	//print_r($result);
	while($row=mysqli_fetch_array($result)){
		echo $row["IDNota"]." ".$row["Nombre"]." ".$row["Porcentaje"]."<br/>";
	}
	?>