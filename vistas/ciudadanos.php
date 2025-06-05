<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciudadanos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@animxyz/core">
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-3 square xyz-in" xyz="duration-20 ease-in-out-back flip-up-100% iterate-infinite">
                <a href="../menu.php" class="btn btn-outline-light">
                    <i class="bi bi-arrow-return-left"></i>
                </a>
            </div>
        </div>
    </div>

    <main class="container text-center">

        <h1 class="color_blanco_de_letra">Ciudadanos</h1>

        <!-- ACA SE AGREGARA EL BOTON PARA AGREGAR MAS CIUDADANOS SE AGREGARA UN MODAL-->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-bookmark-plus"></i></button>

        <div class="row">

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Ciudadano</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../procesos_crud/ciudadanos_crud.php" method="post">
                                <label for="txt_dpi" class="form-label">DPI</label>
                                <input type="number" name="txt_dpi" id="txt_dpi" class="form-control">

                                <label for="txt_apellido" class="form-label">Apellido</label>
                                <input type="text" name="txt_apellido" id="txt_apellido" class="form-control">

                                <label for="txt_nombre" class="form-label">Nombre</label>
                                <input type="text" name="txt_nombre" id="txt_nombre" class="form-control">

                                <label for="txt_direccion" class="form-label">Direccion</label>
                                <input type="text" name="txt_direccion" id="txt_direccion" class="form-control">

                                <label for="tel_casa" class="form-label">Telefono de Casa</label>
                                <input type="tel" name="tel_casa" id="tel_casa" class="form-control">

                                <label for="tel_movil" class="form-label">Telefono Movil</label>
                                <input type="tel" name="tel_movil" id="tel_movil" class="form-control">

                                <label for="email_email" class="form-label">Email</label>
                                <input type="email" name="email_email" id="email_email" class="form-control">

                                <label for="date_fecha_de_nacimiento" class="form-label">Fecha de Nacimiento</label>
                                <input type="date" name="date_fecha_de_nacimiento" id="date_fecha_de_nacimiento" class="form-control">

                                <label for="txt_nivel_academico" class="form-label">Nivel Academico</label>
                                <input type="text" name="txt_nivel_academico" id="txt_nivel_academico" class="form-control">

                                <label for="txt_municipalidad" class="form-label">Municipalidad</label>
                                <input type="text" name="txt_municipalidad" id="txt_municipalidad" class="form-control">

                                <label for="pwd_contraseña" class="form-label">Contraseña</label>
                                <input type="password" name="pwd_contraseña" id="pwd_contraseña" class="form-control">

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary" name="btn_insertar" id="btn_insertar">Agregar Ciudadano</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-12">
                <table class="table table-dark table-striped table-responsive square xyz-in" xyz="small-100% origin-top">
                    <thead>
                        <tr>
                            <th>DPI</th>
                            <th>Apellido</th>
                            <th>Nombre</th>
                            <th>Direccion</th>
                            <th>Tel. Casa</th>
                            <th>Tel. Movil</th>
                            <th>Email</th>
                            <th>Fecha Nac.</th>
                            <th>Nivel Acad.</th>
                            <th>Municipalidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once("../procesos_crud/conexion.php");
                        require_once("../procesos_crud/ciudadanos_crud.php");
                        $sql = "SELECT * FROM ciudadanos";
                        $ejecutar = mysqli_query($conexion, $sql);

                        while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>
                            <tr>
                                <th scope="row"><?= $resultado['dpi']; ?></th>
                                <td><?= $resultado['apellido']; ?></td>
                                <td><?= $resultado['nombre']; ?></td>
                                <td><?= $resultado['direccion']; ?></td>
                                <td><?= $resultado['tel_casa']; ?></td>
                                <td><?= $resultado['tel_movil']; ?></td>
                                <td><?= $resultado['email']; ?></td>
                                <td><?= $resultado['fechanac']; ?></td>
                                <td><?= $resultado['cod_nivel_acad']; ?></td>
                                <td><?= $resultado['cod_muni']; ?></td>
                                <td>
                                    <form action="../forms/form_ciudadanos_editar.php" method="post" style="display:inline;">
                                        <input type="hidden" name="txt_editar_ciudadano" value="<?= $resultado['dpi']; ?>">
                                        <button type="submit" name="btn_editar_ciudadano" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                    </form>
                                    <form action="ciudadanos.php" method="post" style="display:inline;">
                                        <input type="hidden" name="txt_eliminar_ciudadano" id="txt_eliminar_ciudadano" value="<?= $resultado['dpi']; ?>">
                                        <button type="submit" class="btn btn-danger" name="btn_eliminar" id="btn_eliminar"><i class="bi bi-trash3-fill"></i></button>
                                    </form>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>