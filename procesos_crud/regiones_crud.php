<?php

    require_once("conexion.php"); 

    //CODIGO PARA GUARDAR LOS CAMBIOS EN LA INFORMACION DE LAS REGIONES//

    if(isset($_POST['guardar_cambios'])){
        $codigoRegion = $_POST['txt_codigo_region']; 
        $nombreRegion = $_POST['txt_nombre_de_region']; 
        $descripcionRegion = $_POST['txt_desc_region']; 

        $sql = "UPDATE regiones
                SET
                    nombre = '$nombreRegion',
                    descripcion = '$descripcionRegion'
                WHERE
                    cod_region = $codigoRegion"; 

        echo $sql; 

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                echo "<br>Datos Modificados con Éxito!";
                echo "<br><a href ='../vistas/regiones.php'>Regresar</a>";
            } else{
                echo "<br>Error en la consulta: " . mysqli_error($conexion);
            }
        } catch (Exception $th) {
            echo "No se puede modificar: " .$th; 
        }
    }


    //SE INSERTARA EN ESTA SECCION EL CODIGO PARA LA ELIMINACION DE REGISTROS// 

    if (isset($_POST['btn_eliminar_region'])) {
    $codigoRegion = $_POST['txt_eliminar_region'];
    $sql = "delete from regiones where cod_region=" . $codigoRegion;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/regiones.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//CODIGO PARA INSERTAR NUEVAS REGIONES//

if (isset($_POST['btn_insertar_region'])){
    $codigoRegion = $_POST['txt_codigo_de_region']; 
    $nombreRegion = $_POST['txt_nombre_de_region']; 
    $descripcionRegion = $_POST['txt_descripcion_region']; 

    echo "Datos de la Nueva Region: ";
    echo "<br>Codigo de Nueva Region:" . $codigoRegion;
    echo "<br>Nombre:" . $nombreRegion;
    echo "<br>Descripcion:" . $descripcionRegion;

    $sql = "INSERT INTO 
            regiones (
                cod_region, 
                nombre, 
                descripcion)
        VALUES (
                '$codigoRegion', 
                '$nombreRegion', 
                '$descripcionRegion');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/regiones.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}

?>