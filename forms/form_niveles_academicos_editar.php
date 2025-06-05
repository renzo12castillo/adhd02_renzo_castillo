<?php

    $codigo = $_POST['txt_editar_cod_nivel_acad']; 

    require_once("../procesos_crud/conexion.php"); 
    $sql = "select * from nivelesacademicos where cod_nivel_acad=".$codigo; 
    $ejecutar = mysqli_query($conexion, $sql);
    $resultado = mysqli_fetch_assoc($ejecutar); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Nivel Academico</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>

    <main class="container square xyz-in" xyz="small-100% origin-top-left">
        <div class="row">
            <div class="col-12">
                <h1 class="color_blanco_de_letra">Editar Nivel Academico</h1>

                <form action="../procesos_crud/niveles_academicos_crud.php" method="post">
                    <label for="txt_codigo_de_nivel_academico" class="form-label color_blanco_de_letra">Codigo de Nivel Academico</label>
                    <input type="number" name="txt_codigo_de_nivel_academico" id="txt_codigo_de_nivel_academico" class="form-control" readonly value="<?=$codigo;?>">

                    <label for="txt_nombre_del_nivel_academico" class="form-label color_blanco_de_letra">Nombre</label>
                    <input type="text" name="txt_nombre_del_nivel_academico" id="txt_nombre_del_nivel_academico" class="form-control" value="<?=$resultado['nombre'];?>">

                    <label for="txt_desc_del_niv_acad" class="form-label color_blanco_de_letra">Descripcion</label>
                    <input type="text" name="txt_desc_del_niv_acad" id="txt_desc_del_niv_acad" class="form-control" value="<?=$resultado['descripcion'];?>">

                    <button class="btn btn-outline-success btn-lg" type="submit" name="guardar_cambios" id="guardar_cambios">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>
</html>