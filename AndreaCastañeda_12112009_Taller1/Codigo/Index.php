<htm>
<!-->Esta es la pantalla de inicio
	Para este taller use la misma base de datos de estudiantes_web</!-->
<head>
	<title>Inicio</title>
	
</head>
<body>
	<!-->Formulario para iniciar seción</!-->
	<h2>Log in</h2>
		<form action="usuarios.php" method="POST">
			<label>Nombre</label><input type="text" name="name"></input><br>
			<label>Correo</label><input type="text" name="correo"></input><br>
			<input type="submit" name="Entrar">
		</form>		

	<br>
	<br>
	
	<!-->Formulario para registrar un nuevo usuario</!-->
	<h2>Si no tienes cuenta registrate ahora</h2>
		<form action="includes/crearEstudiantes.php" method="POST">
			<label>Nombre</label><input type="text" name="nombre"></input><br>
			<label>Apellido</label><input type="text" name="apellido"></input><br>
			<label>Codigo</label><input type="text" name="codigo"></input><br>
			<label>Correo</label><input type="text" name="correo"></input><br>
			<input type="submit" name="Registrar">
		</form>		
</body>
