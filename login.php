<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio de Sesión</title>
    <!--Bootstrap local-->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/icons/bootstrap-icons.min.css" rel="stylesheet">
    <!--Font Awesome local-->
    <link href="assets/font-awesome/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-light d-flex justify-content-center align-items-center vh-100">

    <div class="card shadow-sm p-4 w-100" style="max-width: 350px;">
        <h2 class="text-center mb-4">
            <i class="bi bi-person-circle text-primary"></i> Iniciar Sesión
        </h2>
        <form>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Correo electronico" required>
            </div>

            <div class="mb-3">
                <label for="contrasena" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingresa tu contraseña" required>
            </div>

            <button type="submit" class="btn btn-primary w-100">Entrar</button>
        </form>
    </div>

    <!--script de bootstrap local-->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>