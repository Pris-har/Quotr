<?php

	session_start();
	include 'config/conexion.php';
	
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$contrasena = hash('sha12', $contrasena);
	
	$validar_login = mysqli_query($con, "SELECT * FROM usuario WHERE correo='$correo' and contrasena='$contrasena'");
	
	if(mysqli_num_rows($validar_login) > 0){
		$_SESSION['usuario'] = $correo;
		header("location: cotizador.php");
		exit;
	}else{
		echo '
			<script>
				alert("Usuario no existe, por favor verifique los datos introducidos");
				windows.location = "index.php";
			</script>
		
		';
		exit;
		
	}
	

?>
