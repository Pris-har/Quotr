<?php
//session_start();
	
//require_once ("db.php");//Contiene las variables de configuracion para conectar a la base de datos
//require_once ("conexion.php");//Contiene funcion que conecta a la base de datos
//include 'db.php';//Contiene las variables de configuracion para conectar a la base de datos
//include 'conexion.php';//Contiene funcion que conecta a la base de datos
$mysqli = new mysqli('remotemysql.com', 'Pua9qGgCRT', 'WxdZ2hLjfr', 'Pua9qGgCRT') or die(mysqli_error($mysqli));
       


if(isset($_POST['guardar'])){
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$modelo = $_POST['modelo'];
	$id_departamento = $_POST['id_departamento'];
	$id_marca = $_POST['id_marca'];
	$estatus = $_POST['estatus'];
	$unidad_medida = $_POST['unidad_medida'];
	$peso = $_POST['peso'];
	$precio = $_POST['precio'];

	$mysqli->query("INSERT INTO productos (codigo_producto, nombre_producto, modelo_producto, id_departamento_producto, id_marca_producto, estatus_producto, unidad_medida_producto, peso_producto, precio_producto) VALUES ('$codigo', '$nombre', '$modelo', '$id_departamento', '$id_marca', '$estatus', '$unidad_medida', '$peso', '$precio')") or die($mysqli->error);

}

?>
