<?php

session_start();
require_once "assets/modelos/MySQL.php";
$sql = new MySQL();
$sql->conectar();
$libros = $sql->efectuarConsulta("SELECT id_libro, titulo_libro, autor_libro,
                            isbn_libro, categoria_libro, disponibilidad_libro,
                            cantidad_libro FROM libros");
$sql->desconectar();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Libros</title>
    <!--Bootstrap local-->
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap/icons/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!--Font Awesome local-->
    <link href="assets/libs/awesome/css/all.min.css" rel="stylesheet">

    <!--SweetAlert local-->
    <link href="assets/sweetAlert/sweetalert2.min.css">
    <style>
        body {
            background-color: #f5f6fa;
        }

        .table thead th {
            background-color: #0d6efd;
            color: white;
        }

        .btn-add {
            background-color: #198754;
            color: white;
        }

        .btn-add:hover {
            background-color: #157347;
        }

        .toolbar {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.05);
            padding: 1rem;
        }
    </style>
</head>

<body>

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="text-primary mb-0"><i class="bi bi-people"></i> Gestión de Libros</h2>
        </div>

        <?php if ($_SESSION["tipo_usuario"] === "1"): ?>
            <div class="toolbar mb-4">
                <div class="row g-2">
                    <div class="col-md-12 d-flex align-items-end justify-content-md-end gap-2">
                        <button id="btn_registro_libro" href="index_libros.php" class="btn btn-outline-success">
                            <i class="fa-solid fa-book"></i> Agregar libro
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Tabla de usuarios -->
        <div class="table-responsive shadow-sm">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID libro</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>ISBN</th>
                        <th>Categoría</th>
                        <th>Disponibilidad</th>
                        <th>Cantidad libro</th>
                        <?php if ($_SESSION["tipo_usuario"] === "1"): ?>
                            <th class="text-center">Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filas = $libros->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $filas["id_libro"]; ?></td>
                            <td><?php echo $filas["titulo_libro"]; ?></td>
                            <td><?php echo $filas["autor_libro"]; ?></td>
                            <td><?php echo $filas["isbn_libro"]; ?></td>
                            <td><?php echo $filas["categoria_libro"]; ?></td>
                            <td><?php echo $filas["disponibilidad_libro"]; ?></td>
                            <td><?php echo $filas["cantidad_libro"]; ?></td>
                            <td class="text-center">
                                <?php if ($_SESSION["tipo_usuario"] === "1"): ?>
                                    <button class="btn btn-sm btn-warning" onclick="editarLibro('<?php echo $filas['id_libro']; ?>',
                                                            '<?php echo $filas['titulo_libro']; ?>',
                                                            '<?php echo $filas['autor_libro']; ?>',
                                                            '<?php echo $filas['isbn_libro']; ?>',
                                                            '<?php echo $filas['categoria_libro']; ?>',
                                                            '<?php echo $filas['cantidad_libro']; ?>',"><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="eliminarLibro('<?php echo $filas['id_libro']; ?>')">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

    </div>

    <!--Bootstrap local-->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--SweetAlert local-->
    <script src="assets/sweetAlert/sweetalert2.all.min.js"></script>

    <!--JS-->
    <script src="assets/public/js/registro_libro.js"></script>
    <script src="assets/public/js/editar_libro.js"></script>
    <script src="assets/public/js/eliminar_libro.js"></script>
</body>

</html>