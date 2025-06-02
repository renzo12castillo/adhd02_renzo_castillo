<?php
require_once("conexion.php");

//EN ESTE CAMPO SE AGREGARA LA OPCION PARA ELIMINAR AL CIUDADANO//

if(isset($_POST['btn_eliminar'])){
    $dpi = $_POST['txt_eliminar_ciudadano']; 
    $sql = "delete from ciudadanos where dpi=".$dpi; 

    try {
        $ejecutar = mysqli_query($conexion, $sql); 
        echo "Registro eliminado con exito"; 
        echo "<br><a href ='../vistas/ciudadanos.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro".$th; 
    }
}

//EN ESTA PARTE SE AGREGA LA OPCION PARA EDITAR LA INFORMACION DE LOS CIUDADANOS//

if (isset($_POST['guardar_cambios'])) { 
    $dpi = $_POST['txt_dpi'];
    $apellido = $_POST['txt_apellido']; 
    $nombre = $_POST['txt_nombre']; 
    $direccion = $_POST['txt_direccion']; 
    $telCasa = $_POST['tel_casa']; 
    $telMovil = $_POST['tel_movil']; 
    $email = $_POST['email_email']; 
    $fechaNacimiento = $_POST['date_fecha_de_nacimiento']; 
    $nivelAcademico = $_POST['txt_nivel_academico']; 
    $municipalidad = $_POST['txt_municipalidad']; 

    $sql = "UPDATE ciudadanos SET 
                apellido = '$apellido', 
                nombre = '$nombre', 
                direccion = '$direccion', 
                tel_casa = '$telCasa', 
                tel_movil = '$telMovil',
                email = '$email',
                fechanac = '$fechaNacimiento', 
                cod_nivel_acad = '$nivelAcademico',
                cod_muni = '$municipalidad'
            WHERE dpi = $dpi";

    echo $sql;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        if ($ejecutar) {
            echo "<br>Datos Modificados con Éxito!";
            echo "<br><a href ='../vistas/ciudadanos.php'>Regresar</a>";
        } else {
            echo "<br>Error en la consulta: " . mysqli_error($conexion);
        }
    } catch (Exception $e) {
        echo "No se puede modificar: ".$e;
    }
}
?>
