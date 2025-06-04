<?php

    require_once("conexion.php"); 

    //CODIGO PARA GUARDAR LOS CAMBIOS EN LA INFORACION DE LOS MUNICIPIOS//

    if(isset($_POST['guardar_cambios'])){
        $codigoMunicipio = $_POST['txt_codigo_municipio']; 
        $nombreMunicipio = $_POST['txt_nombre_municipio']; 
        $codigoDepartamento = $_POST['txt_codigo_departamento']; 

        $sql = "UPDATE municipios
                SET
                    nombre_municipio = '$nombreMunicipio',
                    cod_depto = '$codigoDepartamento'
                WHERE
                    cod_muni = $codigoMunicipio"; 

        echo $sql; 

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                echo "<br>Datos Modificados con Éxito!";
                echo "<br><a href ='../vistas/municipios.php'>Regresar</a>";
            } else{
                echo "<br>Error en la consulta: " . mysqli_error($conexion);
            }
        } catch (Exception $th) {
            echo "No se puede modificar: " .$th; 
        }
    }


    //SE INSERTARA EN ESTA SECCION EL CODIGO PARA LA ELIMINACION DE REGISTROS// 

    if (isset($_POST['btn_eliminar_municipio'])) {
    $codigoMunicipio = $_POST['txt_eliminar_municipio'];
    $sql = "delete from municipios where cod_muni=" . $codigoMunicipio;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/municipios.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//CODIGO PARA INSERTAR NUEVOS MUNICIPIOS//

if (isset($_POST['btn_insertar_municipio'])){
    $codigoMunicipio = $_POST['txt_codigo_de_municipio']; 
    $nombreMunicipio = $_POST['txt_nombre_del_municipio']; 
    $codigoDepartamento = $_POST['txt_codigo_de_departamento']; 

    echo "Datos de los Municipios: ";
    echo "<br>Codigo de Municipio:" . $codigoMunicipio;
    echo "<br>Nombre del Municipio:" . $nombreMunicipio;
    echo "<br>Codigo de Departamento:" . $codigoDepartamento;

    $sql = "INSERT INTO 
            municipios (
                cod_muni, 
                nombre_municipio, 
                cod_depto)
        VALUES (
                '$codigoMunicipio', 
                '$nombreMunicipio', 
                '$codigoDepartamento');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/municipios.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}

?>