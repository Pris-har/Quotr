<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Agrega productos a tu catálogo</title>
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>

  </head>
  <body>
    <?php require_once 'crud_process.php'; ?>

    <?php 
    if (isset($_SESSION['message'])): ?>

    <div class="alert alert-<?=$_SESSION['msg_type']?>">

    <?php 
      echo $_SESSION['message'];
      unset($_SESSION['message']);
    ?>
    </div>

    <?php endif ?>

    <div class="container">
    <?php 
        $mysqli = new mysqli('remotemysql.com', 'Pua9qGgCRT', 'WxdZ2hLjfr', 'Pua9qGgCRT') or die(mysqli_error($mysqli));
        $result = $mysqli->query("SELECT * FROM productos") or die($mysqli->error);
        //pre_r($result);
        //pre_r($result->fetch_assoc());
     ?>

      <div class="row justify-content-center">
        <table class="table">
          <thead>
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
                <th colspan="2">Acciones</th>
            </tr>
         </thead>
        

      <?php
       while ($row = $result->fetch_assoc()):?>
       <tr> 
          <td><?php echo $row['codigo_producto'];?></td>
          <td><?php echo $row['nombre_producto'];?></td>
          <td><?php echo $row['modelo_producto'];?></td>
          <td><?php echo $row['id_departamento_producto'];?></td>
          <td><?php echo $row['id_marca_producto'];?></td>
          <td><?php echo $row['estatus_producto'];?></td>
          <td><?php echo $row['unidad_medida_producto'];?></td>
          <td><?php echo $row['peso_producto'];?></td>
          <td><?php echo $row['precio_producto'];?></td>
          <td>
              <a href="crud2.php?editar=<?php echo $row['id_producto']; ?>"
                class="btn btn-info"> Editar</a>

              <a href="crud_process.php?eliminar=<?php echo $row['id_producto']; ?>"
                class="btn btn-danger"> Eliminar</a>
          
          </td>    
        </tr>
        <?php endwhile; ?>
        </table>
      </div>

     <?php
       function pre_r($array){
          echo '<pre>';
          print_r($array);
          echo '</pre>';

       }
     
    ?>
    <div class="row justify-content-center">
    <form action="crud_process.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id_producto; ?>">
        <div class="form-group">
        <label>Código:</label>
        <input type="text" name="codigo" class="form-control" 
        value="<?php echo $codigo; ?>" placeholder="Ingresa el código de tu producto">
        </div>
        <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" 
        value="<?php echo $nombre; ?>" placeholder="Ingresa el nombre de tu producto">
        </div>
        <div class="form-group">
        <label>Modelo:</label>
        <input type="text" name="modelo" class="form-control" 
        value="<?php echo $modelo; ?>" placeholder="Ingresa el modelo de tu producto">
        </div>
        <div class="form-group">
        <label>ID de Departamento:</label>
        <input type="number" name="id_departamento" class="form-control" 
        value="<?php echo $id_departamento; ?>" placeholder="Ingresa el ID del departamento de tu producto">
        </div>
        <div class="form-group">
        <label>ID de Marca:</label>
        <input type="number" name="id_marca" class="form-control" 
        value="<?php echo $id_marca; ?>" placeholder="Ingresa el ID de la marca de tu producto">
        </div>
        <div class="form-group">
        <label>Estatus:</label>
        <input type="number" name="estatus" class="form-control" 
        value="<?php echo $estatus; ?>" placeholder="Ingresa el estatus de tu producto">
        </div>
        <div class="form-group">
        <label>Unidad de Medida:</label>
        <input type="text" name="unidad_medida" class="form-control" 
        value="<?php echo $unidad_medida; ?>" placeholder="Ingresa la unidad de medida de tu producto">
        </div>
        <div class="form-group">
        <label>Peso:</label>
        <input type="text" name="peso" class="form-control" 
        value="<?php echo $peso; ?>" placeholder="Ingresa el peso de tu producto">
        </div>
        <div class="form-group">
        <label>Precio:</label>
        <input type="number" name="precio" class="form-control" 
        value="<?php echo $precio; ?>" placeholder="Ingresa el precio de tu producto">
        </div>
        <div class="form-group">
        <?php 
        if ($update == true):
        ?>
          <button type="submit" class="btn btn-info" name="actualizar">Actualizar</button>
        <?php 
        else:
        ?>
          <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
        <?php 
        endif;
        ?>
        </div>
    </form>
    </div>             
    </div> 
  </body>
</html>

