<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamentos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="..//css/styles.css">
</head>

<body>

    <main>
        <div class="container">
            <h1 class="color_blanco_de_letra">Departamentos</h1>
            <div class="row">
                <div class="col-12">
                    <table class="table table-dark table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Codigo de Departamento</th>
                                <th scope="col">Nombre del Departamento</th>
                                <th scope="col">Codigo Region</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../procesos_crud/conexion.php");
                            // require_once("../procesos_crud/departamentos_crud.php"); DESCOMENTA ESTA LINEA CUANDO AGREGUES LOS PROCESOS CRUD// 
                            $sql = "SELECT * FROM departamentos";
                            $ejecutar = mysqli_query($conexion, $sql);

                            while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>
                                <tr>
                                    <th scope="row"><?= $resultado['cod_depto']; ?></th>
                                    <td><?= $resultado['nombre_depto']; ?></td>
                                    <td><?= $resultado['cod_region']; ?></td>

                                    <td>
                                        <form action="../forms/form_departamentos_editar.php" method="post">
                                            <input type="hidden" name="txt_editar_departamento" style="display:inline;" value="<?= $resultado['cod_depto'];?>">
                                            <button type="submit" name="btn_editar_departamento" id="btn_editar_departamento" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                        <form action="departamentos.php" method="post">
                                            <input type="hidden" name="" style="display:inline;" value="">
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>