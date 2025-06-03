<?php

    require_once("conexion.php"); 

    //CODIGO PARA GUARDAR LOS CAMBIOS EN LA INFORACION DE LOS DEPARTAMENTOS//

    if(isset($_POST['guardar_cambios'])){
        $codigoDepartamento = $_POST['txt_codigo_departamento']; 
        $nombreDepartamento = $_POST['txt_nombre_departamento']; 
        $codigoRegion = $_POST['txt_codigo_region']; 

        $sql = "UPDATE departamentos
                SET cod_depto = '$codigoDepartamento',"
    }





?>