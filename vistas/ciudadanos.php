<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <main class="container text-center">
    <div class="row">
        <h1>Ciudadanos</h1>
        <div class="col-12">
            <table class="table table-dark table-striped table-responsive">
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
                                <form action="" method="post" style="display:inline;">
                                    <!-- Aquí agregas el input y lógica para eliminar si aplica -->
                                    <button type="submit" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
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