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

            <!--RECUERDA QUE EN LA LINEA DE CODIGO DE ABAJO, EXTRAEMOS LA INFORMACION A TRAVES DEL COMANDO SQL Y AL AGREGAR LA VARIABLE EJECUTAR, ESTA CONECTA CON LA BASE DE DATOS Y EJECUTA LA BUSQUEDA DE LA INFO-->

            <?php
            require_once("../procesos_crud/conexion.php");
            $sql = "select * from ciudadanos";
            $ejecutar = mysqli_query($conexion, $sql);

            // AHORA EN ESTA PARTE EJECUTAREMOS UN CICLO WHILE QUE NOS MOSTRARA LA INFO DE LAS TABLAS //

            while ($resultado = mysqli_fetch_assoc($ejecutar)) { ?>

                <div class="col-12">

                    <!--EN ESTA PARTE DE CODIGO, AGREGAREMOS UNA TABLA QUE MUESTRE LOS DATOS DE CADA CIUDADANO Y UNA OPCION PARA MODIFICARLOS-->

                    <table class="table table-dark table-striped table-responsive">
                        <thead>
                            <tr>
                                <th scope="col" class="p-3">DPI</th>
                                <th scope="col" class="p-3">Apellido</th>
                                <th scope="col" class="p-3">Nombre</th>
                                <th scope="col" class="p-3">Direccion</th>
                                <th scope="col" class="p-3">Telefono de Casa</th>
                                <th scope="col" class="p-3">Telefono Movil</th>
                                <th scope="col" class="p-3">Email</th>
                                <th scope="col" class="p-3">Fecha de Nacimiento</th>
                                <th scope="col" class="p-3">Codigo NV Academico</th>
                                <th scope="col" class="p-3">Codigo de Municipalidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="p-3"><?= $resultado['dpi']; ?></th>
                                <td class="p-3 m-3"><?= $resultado['apellido']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['nombre']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['direccion']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['tel_casa']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['tel_movil']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['email']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['fechanac']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['cod_nivel_acad']; ?></td>
                                <td class="p-3 m-3"><?= $resultado['cod_muni']; ?></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="container">
                        <div class="row">
                            <div class="col-12 d-flex justify-content-center p-3 m-3">
                                <form action="" method="post">
                                    <input type="hidden" name="" id="" value="">
                                    <button type="submit" name="" id="" class="btn btn-success"><i class="bi bi-pencil-square"></i></button>
                                </form>

                                <form action="" method="post">
                                    <input type="hidden" name="" id="" value="">
                                    <button type="submit" name="" id="" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>
                            </div>
                        </div>
                    </div>

                </div>


            <?php
            }
            ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
</body>

</html>