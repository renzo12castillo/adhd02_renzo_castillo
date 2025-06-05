<?php

    require_once("conexion.php"); 

    //CODIGO PARA GUARDAR LOS CAMBIOS EN LA INFORACION DE LOS NIVELES ACADEMICOS//

    if(isset($_POST['guardar_cambios'])){
        $codigoNivelAcademico = $_POST['txt_codigo_de_nivel_academico']; 
        $nombreNivAcad = $_POST['txt_nombre_del_nivel_academico']; 
        $descripcion = $_POST['txt_desc_del_niv_acad']; 

        $sql = "UPDATE nivelesacademicos
                SET
                    nombre = '$nombreNivAcad',
                    descripcion = '$descripcion'
                WHERE
                    cod_nivel_acad = $codigoNivelAcademico"; 

        echo $sql; 

        try {
            $ejecutar = mysqli_query($conexion, $sql);
            if ($ejecutar) {
                echo "<br>Datos Modificados con Éxito!";
                echo "<br><a href ='../vistas/niveles_academicos.php'>Regresar</a>";
            } else{
                echo "<br>Error en la consulta: " . mysqli_error($conexion);
            }
        } catch (Exception $th) {
            echo "No se puede modificar: " .$th; 
        }
    }


    //SE INSERTARA EN ESTA SECCION EL CODIGO PARA LA ELIMINACION DE REGISTROS// 

    if (isset($_POST['btn_eliminar_nivel_acad'])) {
    $codigoNivelAcademico = $_POST['txt_eliminar_nivel_acad'];
    $sql = "delete from nivelesacademicos where cod_nivel_acad=" . $codigoNivelAcademico;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/niveles_academicos.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
    }
}

//CODIGO PARA INSERTAR NUEVOS NIVELES ACADEMICOS//

if (isset($_POST['btn_insertar_nivel_acad'])){
    $codigoNivelAcademico = $_POST['txt_codigo_de_nivel_acad']; 
    $nombreNivelAcademico = $_POST['txt_nombre_del_nivel_acad']; 
    $descripcion = $_POST['txt_descripcion']; 

    echo "Datos del Nivel Academico: ";
    echo "<br>Codigo de Nivel Academico:" . $codigoNivelAcademico;
    echo "<br>Nombre:" . $nombreNivelAcademico;
    echo "<br>Descripcion:" . $descripcion;

    $sql = "INSERT INTO 
            nivelesacademicos (
                cod_nivel_acad, 
                nombre, 
                descripcion)
        VALUES (
                '$codigoNivelAcademico', 
                '$nombreNivelAcademico', 
                '$descripcion');";

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/niveles_academicos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}

?>