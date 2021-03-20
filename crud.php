<?php
/*session_start();
$session_id= session_id();*/

/* Connect To Database*/
require_once ("../config/db.php");//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../config/conexion.php");//Contiene funcion que conecta a la base de datos

$objeto = new con();
$conexion = $objeto->Conectar();

$consulta =  mysqli_query($con,"SELECT id_producto, codigo_producto, nombre_producto, modelo_producto, id_departamento_producto. id_marca_producto, estatus_producto, unidad_medida_producto, peso_producto, precio_producto FROM productos");
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>


<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width-device-width, initial-scale-1">
        <link rel="shortcut icon" href="*">
        <title> Añadir productos a tu catálogo</title>

        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="main.css">

        <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css">
        <link rel="stylesheet" type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">    
    </head>    
    <body>
        <header>
            <h3 class="text-center text-light">Añade productos a tu catálogo </h3>
        </header>
    
        <div class="container">
            <div class="row">
                <div class="col-lg-12">            
                <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
                </div>    
            </div>    
        </div>    

        <br>
        
        <div class="container">
            <div class="row">
                    <div class="col-lg-12">
                        <div class="table-responsive">        
                            <table id="tablaCatalogo" class="table table-striped table-bordered table-condensed" style="width:100%">
                            <thead class="text-center">
                                <tr>
                                    <th>ID</th>
                                    <th>Código</th>
                                    <th>Nombre</th>                                
                                    <th>Modelo</th>  
                                    <th>ID de Departamento</th>
                                    <th>ID de marca</th>
                                    <th>Estatus</th>
                                    <th>Unidad de Medida</th>                                
                                    <th>Peso</th>  
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php                            
                                foreach($data as $dat) {                                                        
                                ?>
                                <tr>
                                    <td><?php echo $dat['id'] ?></td>
                                    <td><?php echo $dat['codigo'] ?></td>
                                    <td><?php echo $dat['nombre'] ?></td>
                                    <td><?php echo $dat['modelo'] ?></td>
                                    <td><?php echo $dat['id_departamento'] ?></td>
                                    <td><?php echo $dat['id_marca'] ?></td>
                                    <td><?php echo $dat['estatus'] ?></td>
                                    <td><?php echo $dat['unidad_medida'] ?></td>  
                                    <td><?php echo $dat['peso'] ?></td>
                                    <td><?php echo $dat['precio'] ?></td>      
                                    <td></td>
                                </tr>
                                <?php
                                    }
                                ?>
                                                        
                            </tbody>        
                           </table>                    
                        </div>
                    </div>
            </div>  
        </div> 

        <!--Modal para CRUD-->
    <div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                    </button>
                </div>

            <form id="formPersonas">    
                <div class="modal-body">
                    <div class="form-group">
                    <label for="codigo" class="col-form-label">Código:</label>
                    <input type="text" class="form-control" id="codigo">
                    </div>
                    <div class="form-group">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre">
                    </div>           
                    <div class="form-group">
                    <label for="modelo" class="col-form-label">Modelo:</label>
                    <input type="text" class="form-control" id="modelo">
                    </div>      
                    <div class="form-group">
                    <label for="id_departamento" class="col-form-label">ID de Departamento:</label>
                    <input type="text" class="form-control" id="id_departamento">
                    </div> 
                    <div class="form-group">
                    <label for="id_marca" class="col-form-label">ID de Marca:</label>
                    <input type="text" class="form-control" id="id_marca">
                    </div>
                    <div class="form-group">
                    <label for="estatus" class="col-form-label">Estatus:</label>
                    <input type="text" class="form-control" id="estatus">
                    </div>     
                    <div class="form-group">
                    <label for="unidad_medida" class="col-form-label">Unidad de Medida:</label>
                    <input type="text" class="form-control" id="unidad_medida">
                    </div>   
                    <div class="form-group">
                    <label for="peso" class="col-form-label">Peso:</label>
                    <input type="text" class="form-control" id="peso">
                    </div>
                    <div class="form-group">
                    <label for="precio" class="col-form-label">Precio:</label>
                    <input type="text" class="form-control" id="precio">
                    </div>      
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                    <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <!-- jQuery, Popper, Js, Booststrap, JS -->
    <script src="jquery/jquery-3.3.1.min.js"></script> 
    <script src="popper/popper.min.js"></script>    
    <script src="bootstrap/js/bootstrap.min.js"></script>    
    

    <!-- datatables JS -->
    <script type="text/javascript" src="datatables/datatables.min.js"></script>    
    <!-- código propio JS --> 
    <script type="text/javascript" src="main.js"></script>  
    </body>
</html>