<?php
require_once("conexion.php");

//EN ESTE CAMPO SE AGREGARA LA OPCION PARA ELIMINAR AL CIUDADANO//

if (isset($_POST['btn_eliminar'])) {
    $dpi = $_POST['txt_eliminar_ciudadano'];
    $sql = "delete from ciudadanos where dpi=" . $dpi;

    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "Registro eliminado con exito";
        echo "<br><a href ='../vistas/ciudadanos.php'>Regresar</a>";
    } catch (Exception $th) {
        echo "Error al eliminar el registro" . $th;
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
        echo "No se puede modificar: " . $e;
    }
}


//ACA SE AGREGARA EL PROCESP DE INSERCION DE NUEVOS CIUDADANOS//

if (isset($_POST['btn_insertar'])) {
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
    $contrasena = $_POST['pwd_contraseña'];

    echo "Datos de los ciudadanos: ";
    echo "<br>DPI:" . $dpi;
    echo "<br>Apellido:" . $apellido;
    echo "<br>Nombre:" . $nombre;
    echo "<br>Direccion:" . $direccion;
    echo "<br>Telefono de Casa" . $telCasa;
    echo "<br>Telefono Movil:" . $telMovil;
    echo "<br>Fecha de Nacimiento:" . $email;
    echo "<br>Nivel Academico:" . $nivelAcademico;
    echo "<br>Municipalidad:" . $municipalidad;
    echo "<br>Contrasena:" . $contrasena;

    $sql = "insert into ciudadanos (dpi, apellido, nombre, direccion, tel_casa, tel_movil, email, fechanac, cod_nivel_acad, cod_muni, contra) 
            values ('$dpi', '$apellido', '$nombre', '$direccion', '$telCasa', '$telMovil','$email', '$fechaNacimiento', '$nivelAcademico', '$municipalidad', '$contrasena'
);";


    try {
        $ejecutar = mysqli_query($conexion, $sql);
        echo "<br>Los datos fueron almacenados con exito";
        header('Location: ../vistas/ciudadanos.php');
        exit;
    } catch (Exception $th) {
        echo "<br>Datos no fueron guardados, intente nuevamente<br>" . $th;
    }
}
