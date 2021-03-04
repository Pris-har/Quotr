<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<?php

    require_once ("config/conexion.php");


    function enviarForm(){

        $nameU = $_POST["nombre"];
        $apP = $_POST["apellidos"];
        $frName = $_POST["nusuario"];
        $comp = $_POST["empresa"];
        $pass = $_POST["pass"];
        $date = $_POST["bday"];
        $idU = rand(1,99);

        //Preparamos la orden SQL
        $sql = "INSERT INTO user VALUES ('$idU','$nameU','$apP','$frName','$comp','$pass','$date')";

        $conexion = new Conexion();
        $conexion->connectBd();
    
        //Funcion para ejecutar Query
        $conexion->Execute($sql);
        
        echo "<script> swal({
            title: '¡OK!',
            text: 'CUENTA CREADA',
            icon: 'success',
        });</script>";
        

    }

?>