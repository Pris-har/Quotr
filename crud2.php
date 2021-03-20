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
    <div class="row justify-content-center">
    <form action="" method="POST">
        <div class="form-group">
        <label>Código:</label>
        <input type="text" name="codigo" class="form-control" value="Código">
        </div>
        <div class="form-group">
        <label>Nombre:</label>
        <input type="text" name="nombre" class="form-control" value="Nombre">
        </div>
        <div class="form-group">
        <label>Modelo:</label>
        <input type="text" name="modelo" class="form-control" value="Modelo">
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
        <input type="text" name="unidad_medida" class="form-control" value="Unidad de Medida">
        </div>
        <div class="form-group">
        <label>Peso:</label>
        <input type="text" name="peso" class="form-control" value="Peso">
        </div>
        <div class="form-group">
        <label>Precio:</label>
        <input type="number" name="precio" class="form-control" value="Precio">
        </div>
        <div class="form-group">
        <button type="submit" name="guardar">Guardar</button>
        </div>
    </form>
    </div>             
	
  </body>
</html>

