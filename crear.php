<?php
require 'dbc.php';
$message = '';
if (isset ($_POST['codigo'])  && isset($_POST['nombre'])  && isset($_POST['modelo']) && isset($_POST['id_departamento'])
    && isset($_POST['id_marca']) && isset($_POST['estatus']) && isset($_POST['unidad_medida']) && isset($_POST['peso'])
    && isset($_POST['precio']))
    
{
    $codigo = $_POST['codigo'];
	$nombre = $_POST['nombre'];
	$modelo = $_POST['modelo'];
	$id_departamento = $_POST['id_departamento'];
	$id_marca = $_POST['id_marca'];
	$estatus = $_POST['estatus'];
	$unidad_medida = $_POST['unidad_medida'];
	$peso = $_POST['peso'];
	$precio = $_POST['precio'];

  $sql = 'INSERT INTO productos (codigo_producto, nombre_producto, modelo_producto, id_departamento_producto, id_marca_producto, 
  estatus_producto, unidad_medida_producto, peso_producto, precio_producto) VALUES (:codigo, :nombre, :modelo, :id_departamento, 
  :id_marca, :estatus, :unidad_medida, :peso, :precio)';
  $statement = $connection->prepare($sql);
  if ($statement->execute([':codigo' => $codigo, ':nombre' => $nombre, ':modelo' => $modelo, ':id_departamento' => $id_departamento,
        ':id_marca' => $id_marca, ':estatus' => $estatus, ':unidad_medida' => $unidad_medida, ':peso' => $peso, ':precio' => $precio])) 
        
    {
    $message = 'Datos insertados exitosamente';
  }



}


 ?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Crear un producto</h2>
    </div>
    <div class="card-body">
      <?php if(!empty($message)): ?>
        <div class="alert alert-success">
          <?= $message; ?>
        </div>
      <?php endif; ?>
      <form method="post">
        <div class="form-group">
        <label for="codigo">Código:</label>
        <input type="text" name="codigo" id="codigo" class="form-control">
        </div>
        <div class="form-group">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" class="form-control">
        </div>
        <div class="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" id="modelo" class="form-control">
        </div>
        <div class="form-group">
        <label for="id_departamento">ID de Departamento:</label>
        <input type="number" name="id_departamento" id="id_departamento" class="form-control">
        </div>
        <div class="form-group">
        <label for="id_marca">ID de Marca:</label>
        <input type="number" name="id_marca" id="id_marca" class="form-control">
        </div>
        <div class="form-group">
        <label for="estatus">Estatus:</label>
        <input type="number" name="estatus" id="estatus" class="form-control">
        </div>
        <div class="form-group">
        <label for="unidad_medida">Unidad de Medida:</label>
        <input type="text" name="unidad_medida" id="unidad_medida" class="form-control">
        </div>
        <div class="form-group">
        <label for="peso">Peso:</label>
        <input type="text" name="peso" id="peso" class="form-control">
        </div>
        <div class="form-group">
        <label for="precio">Precio:</label>
        <input type="number" name="precio" id="precio" class="form-control">
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-info">Crear un producto</button>
        </div>
      </form>
    </div>
  </div>
</div>
<?php require 'footer.php'; ?>