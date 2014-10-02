<?php
	include_once("database.php");

	$usuario = $_GET["Usuario"];
	$post = $_GET["idPost"];
	echo "Mi nombre es ".$usuario;

	$traerID = "SELECT usuarios.usuarioID FROM mensajeria.usuarios WHERE usuarios.Nombre= '$usuario'";
	$resultID=mysqli_query($con,$traerID);

	while ($row = mysqli_fetch_array($resultID)) {
		$idUser = $row["usuarioID"];
		echo "mi nombre es: ". $usuario;
		echo "mi ID es: ". $idUser;
	}

	$query = "INSERT INTO mensajeria.likes (likeID, likeUserID, likePostID) VALUES ('','$idUser','$post')";
	$result=mysqli_query($con,$query);
	
	header('Location: http://localhost/AndreaCastaneda_U1/mensajeria/index.php?usuario='.$usuario)

?>