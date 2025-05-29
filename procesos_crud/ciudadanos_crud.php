<?php

//AHORA SE HARA LA INSERCION DE EL METODO PARA QUE SE PUEDA COMPLETAR LA EDICION DE LOS DATOS//
    if(isset($_POST['btn_editar_ciudadano'])){
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
    }

?>