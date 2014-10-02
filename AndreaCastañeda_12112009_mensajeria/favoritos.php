<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Mensajeria</title>
		<meta keywords="ejercicio HTML-CSS Mensajeria" description="Este es un ejercicio">
		<meta name="viewport" content="width=device-width, user-scalable=no">
		<link rel="stylesheet" href="css/styles.css">
	</head>
	<body>
		<header>
			<div id="nombre">
						<h1>Mensajería</h1>
					</div>
		</header>
		<div class="container">
			<div class="navegacion">
				<nav>
					<ul class="list-inline list">
							<li class="lista"><a href="#"><h2>Home</h2></a></li>
							<li class="lista"><a href="#"><h2>Amigos</h2></a></li>
							<li class="lista"><a href="#"><h2>Perfil</h2></a></li>
						</ul>
				</nav>
			</div>
			<div class="contenedor">
				<section>
					<?php
						include_once("includes/database.php");

						$usuarioActivo = $_GET["usuario"];
						$traerID = "SELECT usuarios.usuarioID FROM mensajeria.usuarios WHERE usuarios.Nombre= '$usuarioActivo'";
						$resultID=mysqli_query($con,$traerID);

						while ($row = mysqli_fetch_array($resultID)) {
							$idUser = $row["usuarioID"];
						}

						$qPosts = "SELECT usuarios.Nombre, publicaciones.contenido, publicaciones.postID
								FROM mensajeria.usuarios 
								JOIN mensajeria.publicaciones 
								ON publicaciones.postUserID = usuarios.usuarioID
								JOIN mensajeria.favoritos
								ON favoritos.favPostID = publicaciones.postID
								WHERE favUserID = '$idUser'";

						$rPost = mysqli_query($con, $qPosts);
						$usuarioActivo = $_GET["usuario"];

						echo "<h2><a href='index.php?usuario=".$usuarioActivo."'>Vuelve a la página principal</a></h2>";

						while ($row = mysqli_fetch_array($rPost)) {
							echo "<div class='post'>";
								echo "<div class='user'>";
									echo "<img src='img/user.png' alt='usuario'>";
								echo "</div>";
								echo "<div class='content'>";
									echo "<div class='username'>".$row["Nombre"]."</div>";
									echo "<p>".$row["contenido"]."</p>";
									echo "<div class='btn'>";
										echo "<ul class='list-inline list'>";
											echo "<li class='like'><a href='includes/addLike.php?Usuario=".$usuarioActivo."&idPost=".$row["postID"]."'>L</a></li>";
											echo "<li class='dlike'><a href='#'>DL</a></li>";
											echo "<li class='favorito'><a href='includes/addFav.php?Usuario=".$usuarioActivo."&idPost=".$row["postID"]."'>F</a></li>";
										echo "</ul>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						}
					?>
				</section>
			</div> 
		</div> 
	</body>
	<footer>
		<div class="fin">
			<p>Creado por</p>
			<p>Andrea Castañeda Bueno</p>
		</div>
	</footer>
</html>