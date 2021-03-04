<html>

    <head>
        <meta charset="UTF-8">
        <title>Login</title>
        <link rel="stylesheet" href="estilo1.css">
        <script>
            if (window.history.replaceState) { // verificamos disponibilidad
                window.history.replaceState(null, null, window.location.href);
            }
    </script>
       
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
       <?php

        require_once ("config/conexion.php");

                if(isset($_POST['btningresar'])){
                    

                    $user = strtolower($_POST['usuario']);
                    $pass = strtolower($_POST['pass']);


                    $prueba ="SELECT `user_id` FROM `user` WHERE `firstname` = '$user' AND `password` = '$pass'";
            
                    $conexion = new Conexion();
                    $conexion->connectBd();
                    $result =   $conexion->Execute($prueba);

                            if (mysqli_num_rows($result)==1) {
                                
                                header("Location: cotizador.php");
                                    
                        }else{
    
                            echo "<script> swal({
                                title: 'Error!',
                                text: 'DATOS ERRONEOS',
                                icon: 'error',
                            });</script>";
                        }
                    
                       
                }
                

        ?>
 
    </head>

    <body>
        <form  method="POST">
            <h2>Iniciar sesión</h2>
            <input type="text" placeholder="&#128273; Usuario" name="usuario" autocomplete="off">
            <input type="password" placeholder="&#128274; Contraseña" name="pass" required>
            <input type="submit" value="Ingresar" name="btningresar">

            <br>
            <a href="signup.php" style="float:right">Crear una cuenta</a>

        </form>
        
    </body>
</html>
