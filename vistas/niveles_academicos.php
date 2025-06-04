<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Niveles Academicos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="..//css/styles.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="../menu.php" class="btn btn-outline-light">
                    <i class="bi bi-arrow-return-left"></i>
                </a>
            </div>
        </div>
    </div>

    <main>
        <div class="container text-center">
            <h1 class="color_blanco_de_letra">Municipios</h1>

        <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-bookmark-plus"></i></button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Municipio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../procesos_crud/municipios_crud.php" method="post">
                                <label for="txt_codigo_de_municipio" class="form-label">Codigo de Municipio</label>
                                <input type="number" name="txt_codigo_de_municipio" id="txt_codigo_de_municipio" class="form-control">

                                <label for="txt_nombre_del_municipio" class="form-label">Nombre del Municipio</label>
                                <input type="text" name="txt_nombre_del_municipio" id="txt_nombre_del_municipio" class="form-control">

                                <label for="txt_codigo_de_departamento" class="form-label">Codigo Departamento</label>
                                <input type="number" name="txt_codigo_de_departamento" id="txt_codigo_de_departamento" class="form-control">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" name="btn_insertar_municipio" id="btn_insertar_municipio">Agregar Municipio</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <table class="table table-dark table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col">Codigo de Municipio</th>
                                <th scope="col">Nombre del Municipio</th>
                                <th scope="col">Codigo Departamento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require_once("../procesos_crud/conexion.php");
                            require_once("../procesos_crud/municipios_crud.php");
                            $sql = "SELECT * FROM municipios";
                            $ejecutar = mysqli_query($conexion, $sql);

                            while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>
                                <tr>
                                    <th scope="row"><?= $resultado['cod_muni']; ?></th>
                                    <td><?= $resultado['nombre_municipio']; ?></td>
                                    <td><?= $resultado['cod_depto']; ?></td>

                                    <td>
                                        <form action="../forms/form_municipios_editar.php" method="post">
                                            <input type="hidden" name="txt_editar_municipio" style="display:inline;" value="<?= $resultado['cod_muni'];?>">
                                            <button type="submit" name="btn_editar_municipio" id="btn_editar_municipio" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                        </form>
                                        <form action="municipios.php" method="post">
                                            <input type="hidden" name="txt_eliminar_municipio" style="display:inline;" value="<?= $resultado['cod_muni'];?>">
                                            <button type="submit" class="btn btn-danger" name="btn_eliminar_municipio" id="btn_eliminar_municipio"><i class="bi bi-trash3-fill"></i></button>
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