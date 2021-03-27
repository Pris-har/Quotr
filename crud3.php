<?php
require 'dbc.php';
$sql = 'SELECT * FROM productos';
$statement = $connection->prepare($sql);
$statement->execute();
$people = $statement->fetchAll(PDO::FETCH_OBJ);
 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Productos</h2>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
        <th>Código</th>
        <th>Nombre</th>
        <th>Modelo</th>
        <th>ID del Departamento</th>
        <th>ID de Marca</th>
        <th>Estatus</th>
        <th>Unidad de Medida</th>
        <th>Peso</th>
        <th>Precio</th>
        <th>Acciones</th>
        </tr>
        <?php foreach($productos as $n_producto): ?>
          <tr>
            <td><?= $n_producto->codigo_producto; ?></td>
            <td><?= $n_producto->nombre_producto; ?></td>
            <td><?= $n_producto->modelo_producto; ?></td>
            <td><?= $n_producto->id_departamento_producto; ?></td>
            <td><?= $n_producto->id_marca_producto; ?></td>
            <td><?= $n_producto->estatus_producto; ?></td>
            <td><?= $n_producto->unidad_medida_producto; ?></td>
            <td><?= $n_producto->peso_producto; ?></td>
            <td><?= $n_producto->precio_producto; ?></td>
            <td>
              <a href="editar.php?id_producto=<?= $n_producto->id_producto ?>" class="btn btn-info">Editar</a>
              <a onclick="return confirm('¿Seguro que quieres eliminar este registro?')" href="borrar.php?id_producti=<?= $n_producto->id_producto ?>" class='btn btn-danger'>Borrar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>