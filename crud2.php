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
          <td><?php echo $row['codigo'];?></td>
          <td><?php echo $row['nombre'];?></td>
          <td><?php echo $row['modelo'];?></td>
          <td><?php echo $row['id_departamento'];?></td>
          <td><?php echo $row['id_marca'];?></td>
          <td><?php echo $row['estatus'];?></td>
          <td><?php echo $row['unidad_medida'];?></td>
          <td><?php echo $row['peso'];?></td>
          <td><?php echo $row['precio'];?></td>
          <td></td>    
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
        <div class="form-group">
        <label>Código:</label>
        <input type="text" name="codigo" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>Modelo:</label>
        <input type="text" name="modelo" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>ID de Departamento:</label>
        <input type="number" name="id_departamento" class="form-control" value="ID de Departamento">
        </div>
        <div class="form-group">
        <label>ID de Marca:</label>
        <input type="number" name="id_marca" class="form-control" value="ID de Marca">
        </div>
        <div class="form-group">
        <label>Estatus:</label>
        <input type="number" name="estatus" class="form-control" value="Estatus">
        </div>
        <div class="form-group">
        <label>Unidad de Medida:</label>
        <input type="text" name="unidad_medida" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>Peso:</label>
        <input type="text" name="peso" class="form-control" value="">
        </div>
        <div class="form-group">
        <label>Precio:</label>
        <input type="number" name="precio" class="form-control" value="Precio">
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
        </div>
    </form>
    </div>             
	
  </body>
</html>

