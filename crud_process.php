<?php

session_start();
	
//require_once ("db.php");//Contiene las variables de configuracion para conectar a la base de datos
//require_once ("conexion.php");//Contiene funcion que conecta a la base de datos
//include 'db.php';//Contiene las variables de configuracion para conectar a la base de datos
//include 'conexion.php';//Contiene funcion que conecta a la base de datos
$mysqli = new mysqli('remotemysql.com', 'Pua9qGgCRT', 'WxdZ2hLjfr', 'Pua9qGgCRT') or die(mysqli_error($mysqli));

$id_producto = 0;
$update = false;
$codigo = '';
$nombre = '';
$modelo = '';
$id_departamento = '';
$id_marca = '';
$estatus = '';
$unidad_medida = '';
$peso = '';
$precio = '';


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
	
	$_SESSION['message'] = "¡Su registro se ha guardado!";
	$_SESSION['msg_type'] = "success";

	header("location: crud2.php");
}

if(isset($_GET['eliminar'])){
	$id_producto = $_GET['eliminar'];
	
	$mysqli->query("DELETE FROM productos WHERE id_producto=$id_producto")or die($mysqli->error());

	$_SESSION['message'] = "¡Su registro se ha eliminado!";
	$_SESSION['msg_type'] = "danger";

	header("location: crud2.php");
}

if(isset($_GET['editar'])){
	$id_producto = $_GET['editar'];
	$update = true;
	$result = $mysqli->query("SELECT * FROM productos WHERE id_producto=$id_producto") or die($mysqli->error());
	if ($result->num_rows){
	//if (count($result)==1){
		$row = $result->fetch_array();
		$codigo = $row['codigo'];
		$nombre = $row['nombre'];
		$modelo = $row['modelo'];
		$id_departamento = $row['id_departamento'];
		$id_marca = $row['id_marca'];
		$estatus = $row['estatus'];
		$unidad_medida = $row['unidad_medida'];
		$peso = $row['peso'];
		$precio = $row['precio'];

	}
	
	//header('location: crud2.php');
	
}

if(isset($_POST['actualizar'])){
	$id_producto = $_POST['actualizar'];
	$codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$modelo = $_POST['modelo'];
	$id_departamento = $_POST['id_departamento'];
	$id_marca = $_POST['id_marca'];
	$estatus = $_POST['estatus'];
	$unidad_medida = $_POST['unidad_medida'];
	$peso = $_POST['peso'];
	$precio = $_POST['precio'];
	
	$mysqli->query("UPDATE productos SET codigo='$codigo', nombre='$nombre', modelo='$modelo', id_departamento='$id_departamento', id_marca='$id_marca', estatus='$estatus',
	unidad_medida='$unidad_medida', peso='$peso', precio='$precio' WHERE id_producto=$id_producto") or die($mysqli->error);

	$_SESSION['message'] = "¡El producto se ha actualizado!";
	$_SESSION['msg_type'] = "warning";

	header('location: crud2.php');
}

?>