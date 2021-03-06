<?php

	session_start();
	//include 'conexion.php';
	
        require_once ("db.php");//Contiene las variables de configuracion para conectar a la base de datos
	require_once ("conexion.php");//Contiene funcion que conecta a la base de datos

	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	$contrasena = hash('sha12', $contrasena);
	
	$validar_login = mysqli_query($con, "SELECT * FROM usuario WHERE correo='$correo' and contrasena='$contrasena'");
	
	if(mysqli_num_rows($validar_login) > 0){
		$_SESSION['usuario'] = $correo;
		header("location: ../cotizador.php");
		exit();
	}else{
		echo '
			<script>
				alert("Usuario no existe, por favor verifique los datos introducidos");
				windows.location = "../index.php";
			</script>
		
		';
		exit();
		
	}
	

?>
