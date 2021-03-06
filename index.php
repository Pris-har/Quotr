<?php

	session_start();
	
	if(isset($_SESSION['usuario'])){
		header("location: cotizador.php");
		
	}


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Entrar al Cotizador de Productos Online</title>
	
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="estilo2.css">
    
  </head>
  <body>
	  
	<main>
	<div class="contenedor__todo">
		<div class="caja__trasera">
			<div class="caja__trasera-login">
				<h3>¿Ya tienes cuenta?</h3>
				<p>Inicia sesión para entrar en la página</p>
				<button id="btn__iniciar-sesion">Iniciar sesión</button>
			</div>
			<div class="caja__trasera-register">
				<h3>¿Aún no tienes cuenta? ---??</h3>
				<p>Regístrate para que puedas iniciar sesión</p>
				<button id="btn__registrarse">Regístrarse</button>
			</div>
		</div>
		
		<div class="contenedor__login-register">
			<form action="config/login_usuario.php" method="POST" class="formulario__login">
				<h2>Iniciar sesión</h2>
				<input type="text" placeholder="Correo Electrónico" name="correo" class="emailLog">
				<input type="password" placeholder="Contraseña" name="contrasena" class="passwLog">
				<button>Entrar</button>
			</form>
			
			<form action="config/registro_usuario.php" method="POST" class="formulario__register">
				<h2>Registrarse</h2>
				<input type="text" placeholder="*Nombre(s)" name="nombres" required>
				<input type="text" placeholder="*Apellido(s)" name="apellidos" required>
				<input type="text" placeholder="*Empresa" name="empresa" required>
				<input type="text" placeholder="*Example@domain.com" name="correo" class="email">
				<input type="password" placeholder="*Contraseña" name="contrasena" required  class="passw">
				<button>Registrarse</button>
			</form>
		</div>
	</div>
	</main>
	<script src="js/script1.js"></script>
  </body>
</html>
