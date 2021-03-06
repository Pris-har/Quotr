<?php
	
	include 'conexion.php';
	
	$nombre = $_POST['nombres'];
	$apellido = $_POST['apellidos'];
	$empresa = $_POST['empresa'];
	$correo = $_POST['correo'];
	$contrasena = $_POST['contrasena'];
	
	//CIFRAR CONTRASEÑA
	$contrasena = hash('sha512', $contrasena);
	
	$query = "INSERT INTO usuario(nombre, apellido, empresa, correo, contrasena)VALUES('$nombre', '$apellido', '$empresa', '$correo', '$contrasena')";
	
	//VERIFICAR QUE EL CORREO NO SE REPITA EN LA BASE DE DATOS
	
	$verificar_correo = mysqli_query($con, "SELECT * FROM usuario WHERE correo='$correo' ");
	
	if(mysqli_num_rows($verificar_correo) > 0){
		echo '
			<script>
				alert("Este correo ya está registrado, intenta con otro diferente");
				window.location = "../index.php";
			</script>
		';
		exit();
	}
	
	$ejecutar = mysqli_query($con, $query);
	
	if($ejecutar){
		echo '
			<script>
				alert("Usuario almacenado exitosamente");
				window.location = "../index.php";
			</script>
		';	
	}else{
		echo '
			<script>
				alert("Inténtalo de nuevo, usuario no almacenado");
				window.location = "../index.php";
			</script>
		';
	}
	
	mysqli_close($con);
?>
