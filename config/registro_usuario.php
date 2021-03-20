<?php
	include 'db.php';//Contiene las variables de configuracion para conectar a la base de datos
	include 'conexion.php';//Contiene funcion que conecta a la base de datos
	//include 'conexion.php';
	
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


	if (!preg_match("/^[^\s@]+@[^\s@]+\.[^\s@]+$/", "$correo")){
		echo '
			<script>
				alert("El correo debe cumplir con el formato");
				window.location = "../index.php";
			</script>
		';
	}

	if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.{6,})/", "$contrasena")){
		echo '
			<script>
				alert("La contraseña debe cumplir con el formato");
				window.location = "../index.php";
			</script>
		';
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
