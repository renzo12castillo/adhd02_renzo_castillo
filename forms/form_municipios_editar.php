<?php

    $codigo = $_POST['txt_editar_municipio']; 

    require_once("../procesos_crud/conexion.php"); 
    $sql = "select * from municipios where cod_muni=".$codigo; 
    $ejecutar = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($ejecutar); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Municipio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <main class="container square xyz-in" xyz="small-100% origin-top-left">
        <div class="row">
            <div class="col-12">
                <h1 class="color_blanco_de_letra">Editar Municipio</h1>

                <form action="../procesos_crud/municipios_crud.php" method="post">
                    <label for="txt_codigo_municipio" class="form-label color_blanco_de_letra">Codigo de Municipio</label>
                    <input type="number" name="txt_codigo_municipio" id="txt_codigo_municipio" class="form-control" readonly value="<?=$codigo;?>">

                    <label for="txt_nombre_municipio" class="form-label color_blanco_de_letra">Nombre del Municipio</label>
                    <input type="text" name="txt_nombre_municipio" id="txt_nombre_municipio" class="form-control" value="<?=$resultado['nombre_municipio'];?>">

                    <label for="txt_codigo_departamento" class="form-label color_blanco_de_letra">Codigo de Departamento</label>
                    <input type="number" name="txt_codigo_departamento" id="txt_codigo_departamento" class="form-control" value="<?=$resultado['cod_depto'];?>">

                    <button class="btn btn-outline-success btn-lg" type="submit" name="guardar_cambios" id="guardar_cambios">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>