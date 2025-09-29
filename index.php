<?php

session_start();
require_once "assets/modelos/MySQL.php";
$sql = new MySQL();
$sql->conectar();
$fila = $sql->efectuarConsulta("SELECT u.id_usuario, u.nombre_usuario, u.apellido_usuario,
                    u.email_usuario, contrasena_usuario, u.fk_tipo_usuario, t.id_tipo_usuario, t.nombre_tipo_usuario 
                    FROM usuarios AS u INNER JOIN tipos_usuarios AS t ON t.id_tipo_usuario = u.fk_tipo_usuario");

$tipos_usuarios_c = $sql->efectuarConsulta("SELECT * FROM tipos_usuarios");
$tipos_usuarios = [];
while ($fila_tipos = $tipos_usuarios_c->fetch_assoc()) {
    $tipos_usuarios[] = $fila_tipos;
}

$tipos_usuarios_json = json_encode($tipos_usuarios, JSON_UNESCAPED_UNICODE);
$sql->desconectar();

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestión de Usuarios</title>
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
            <h2 class="text-primary mb-0"><i class="bi bi-people"></i> Gestión de Usuarios</h2>
            <button id="btn_registro_usuario" class="btn btn-add" data-tipos-usuarios='<?php echo $tipos_usuarios_json; ?>'>
                <i class="bi bi-person-plus"></i> Nuevo usuario
            </button>
        </div>

        <?php if ($_SESSION["tipo_usuario"] === "1"): ?>
            <div class="toolbar mb-4">
                <div class="row g-2">
                    <div class="col-md-12 d-flex align-items-end justify-content-md-end gap-2">
                        <a href="index_libros.php" class="btn btn-outline-warning">
                            <i class="fa-solid fa-book"></i> Libros
                        </a>
                        <button class="btn btn-outline-danger">
                            <i class="bi bi-file-earmark-pdf"></i> Exportar PDF
                        </button>
                        <button class="btn btn-outline-success">
                            <i class="bi bi-file-earmark-excel"></i> Exportar Excel
                        </button>
                        <button class="btn btn-outline-secondary">
                            <i class="bi bi-graph-up"></i> Ver estadísticas
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <!-- Tabla donde se gestionan los usuarios -->
        <div class="table-responsive shadow-sm">
            <table class="table table-hover align-middle">
                <thead>
                    <tr>
                        <th>ID usuario</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Correo</th>
                        <th>Tipo de usuario</th>
                        <?php if ($_SESSION["tipo_usuario"] === "1"): ?>
                            <th class="text-center">Acciones</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($filas = $fila->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo $filas["id_usuario"]; ?></td>
                            <td><?php echo $filas["nombre_usuario"]; ?></td>
                            <td><?php echo $filas["apellido_usuario"]; ?></td>
                            <td><?php echo $filas["email_usuario"]; ?></td>
                            <td><?php echo $filas["nombre_tipo_usuario"]; ?></td>
                            <td class="text-center">
                                <?php if ($_SESSION["tipo_usuario"] === "1"): ?>
                                    <button class="btn btn-sm btn-warning" onclick="editarUsuario('<?php echo $filas['id_usuario']; ?>',
                                                            '<?php echo $filas['nombre_usuario']; ?>',
                                                            '<?php echo $filas['apellido_usuario']; ?>',
                                                            '<?php echo $filas['email_usuario']; ?>',
                                                            '<?php echo $filas['contrasena_usuario']; ?>',
                                                            this.dataset.tiposUsuarios)"
                                        data-tipos-usuarios='<?php echo htmlspecialchars($tipos_usuarios_json, ENT_QUOTES, "UTF-8"); ?>'><i class="bi bi-pencil-square"></i></button>
                                    <button class="btn btn-sm btn-danger" onclick="eliminarUsuario('<?php echo $filas['id_usuario']; ?>')">
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
    <script src="assets/public/js/registro_usuario.js"></script>
    <script src="assets/public/js/editar_usuario.js"></script>
    <script src="assets/public/js/eliminar_usuario.js"></script>
</body>

</html>