<?php

    require_once("conexion.php"); 

    //CODIGO PARA GUARDAR LOS CAMBIOS EN LA INFORACION DE LOS DEPARTAMENTOS//

    if(isset($_POST['guardar_cambios'])){
        $codigoDepartamento = $_POST['txt_codigo_departamento']; 
        $nombreDepartamento = $_POST['txt_nombre_departamento']; 
        $codigoRegion = $_POST['txt_codigo_region']; 

        $sql = "UPDATE departamentos
                SET
                    nombre_depto = '$nombreDepartamento',
                    cod_region = '$codigoRegion'
                WHERE
                    cod_depto = $codigoDepartamento"; 

        echo $sql; 

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                echo "<br>Datos Modificados con Éxito!";
                echo "<br><a href ='../vistas/departamentos.php'>Regresar</a>";
            } else{
                echo "<br>Error en la consulta: " . mysqli_error($conexion);
            }
        } catch (Exception $th) {
            echo "No se puede modificar: " .$th; 
        }
    }


    //SE INSERTARA EN ESTA SECCION EL CODIGO PARA LA ELIMINACION DE REGISTROS// 

    if (isset($_POST['btn_eliminar_departamento'])) {
    $codigoDepartamento = $_POST['txt_eliminar_departamento'];
    $sql = "delete from departamentos where cod_depto=" . $codigoDepartamento;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/departamentos.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//CODIGO PARA INSERTAR NUEVOS DEPARTAMENTOS//

if (isset($_POST['btn_insertar_depto'])){
    $codigoDepartamento = $_POST['txt_codigo_de_departamento']; 
    $nombreDepartamento = $_POST['txt_nombre_del_departamento']; 
    $codigoRegion = $_POST['txt_codigo_de_region']; 

    echo "Datos de los departamentos: ";
    echo "<br>Codigo de Departamento:" . $codigoDepartamento;
    echo "<br>Nombre del Departamento:" . $nombreDepartamento;
    echo "<br>Codigo de Region:" . $codigoRegion;

    $sql = "INSERT INTO 
            departamentos (
                cod_depto, 
                nombre_depto, 
                cod_region)
        VALUES (
                '$codigoDepartamento', 
                '$nombreDepartamento', 
                '$codigoRegion');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/departamentos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}

?>