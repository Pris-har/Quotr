
<?php 
require_once ("validate.php");


    if(isset($_POST['registrar'])){
      enviarForm();
    }
  

?>
<html>
  <head>
    <!-- evitar el reenvío de solicitudes POST -->
    <script>
    if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
    <meta charset="UTF-8">
    <title>Registro de usuario</title>
    <link rel="stylesheet" href="estilo1.css">

  </head>
  <body>
    <form method="POST">
        <h2>Crea una cuenta</h2>
        <input type="text" placeholder="Nombre" name="nombre" autocomplete="off" required>
        <input type="text" placeholder="Apellidos" name="apellidos" autocomplete="off" required>
        <input type="text" placeholder="Nombre de usuario" name="nusuario" autocomplete="off" required>
        <input type="text" placeholder="Empresa" name="empresa" autocomplete="off" required>
        <input type="password" placeholder="Contraseña" name="pass" autocomplete="off" required>
        <input type="password" placeholder="Confirmar contraseña" name="passc" autocomplete="off" required>
          
        <label> Fecha nacimiento: 
            <input type="date" name="bday">
        </label>
          
        <input type="submit" value="Registrar"  name="registrar">
        <br>
        <a href="index.php" style="float:right">Regresar</a>

    </form>
  </body>
</html>