<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <!--Bootstrap local-->
    <link href="assets/libs/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/libs/bootstrap/icons/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!--Font Awesome local-->
    <link href="assets/libs/awesome/css/all.min.css" rel="stylesheet">

    <!--SweetAlert local-->
    <link href="assets/sweetAlert/sweetalert2.min.css">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm p-4 w-100" style="max-width: 350px;">
        <h2 class="text-center mb-4">
            <i class="bi bi-person-circle text-primary"></i> Iniciar Sesión
        </h2>
        <form action="assets/controladores/login.php" method="post">
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email_usuario" name="email_usuario" placeholder="Correo electronico" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena_usuario" name="contrasena_usuario" placeholder="Ingresa tu contraseña" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>

    <!--Bootstrap local-->
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!--SweetAlert local-->
    <script src="assets/sweetAlert/sweetalert2.all.min.js"></script>
</body>

</html>