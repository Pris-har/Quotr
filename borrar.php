<?php
require 'dbc.php';
$id_producto = $_GET['id_producto'];
$sql = 'DELETE FROM productos WHERE id_producto=:id_producto';
$statement = $connection->prepare($sql);
if ($statement->execute([':id_producto' => $id_producto])) {
  header("Location: /");
}