<?php

    $codigo = $_POST['txt_editar_ciudadano']; 

    require_once("../procesos_crud/conexion.php"); 
    $sql = "select * from ciudadanos where dpi=".$codigo; 
    $ejecutar = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($ejecutar); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Ciudadanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>
<body>

    <main class="container">
        <div class="row">
            <div class="col-12">
                <h1>Editar Ciudadanos</h1>

                <form action="../vistas/ciudadanos.php" method="post">
                    <label for="txt_dpi" class="form-label">DPI</label>
                    <input type="number" name="txt_dpi" id="txt_dpi" class="form-control" readonly value="<?=$codigo;?>">

                    <label for="txt_apellido" class="form-label">Apellido</label>
                    <input type="text" name="txt_apellido" id="txt_apellido" class="form-control" value="<?=$resultado['apellido'];?>">

                    <label for="txt_nombre" class="form-label">Nombre</label>
                    <input type="text" name="txt_nombre" id="txt_nombre" class="form-control" value="<?=$resultado['nombre'];?>">

                    <label for="txt_direccion" class="form-label">Direccion</label>
                    <input type="text" name="txt_direccion" id="txt_direccion" class="form-control" value="<?=$resultado['direccion'];?>">

                    <label for="tel_casa" class="form-label">Telefono de Casa</label>
                    <input type="tel" name="tel_casa" id="tel_casa" class="form-control" value="<?=$resultado['tel_casa'];?>">

                    <label for="tel_movil" class="form-label">Telefono Movil</label>
                    <input type="tel" name="tel_movil" id="tel_movil" class="form-control" value="<?=$resultado['tel_movil'];?>">

                    <label for="email_email" class="form-label">Email</label>
                    <input type="email" name="email_email" id="email_email" class="form-control" value="<?=$resultado['email'];?>">

                    <label for="date_fecha_de_nacimiento" class="form-label">Fecha de Nacimiento</label>
                    <input type="date" name="date_fecha_de_nacimiento" id="date_fecha_de_nacimiento" class="form-control" value="<?=$resultado['fechanac'];?>">

                    <label for="txt_nivel_academico" class="form-label">Nivel Academico</label>
                    <input type="text" name="txt_nivel_academico" id="txt_nivel_academico" class="form-control" value="<?=$resultado['cod_nivel_acad'];?>">

                    <label for="txt_municipalidad" class="form-label">Municipalidad</label>
                    <input type="text" name="txt_municipalidad" id="txt_municipalidad" class="form-control" readonly value="<?=$resultado['cod_muni'];?>">

                    <button class="btn btn-outline-success btn-lg" type="submit" name="btn_editar_ciudadano" id="btn_editar_ciudadano">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>