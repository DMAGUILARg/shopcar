<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('application/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('application/assets/css/login.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('application/assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('application/assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('application/assets/js/bootstrap.bundle.min.js'); ?>"></script>
</head>

<body>
    <div>
        <div class="card">
            <img class="mb-3" src="<?= base_url('application/assets/img/logo.png'); ?>" alt="Logo">
            <h5>Introduzca sus credenciales para iniciar sesión</h5>
            <form id="loginForm">
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Correo Electrónico" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Contraseña" required>
                    </div>
                </div>
                <button type="submit" class="btn w-100">Iniciar Sesión</button>
                <a href="<?= base_url('register'); ?>" class="register-link">¿No tienes cuenta? Regístrate aquí <i
                        class="bi bi-person-plus"></i></a>
            </form>
        </div>
    </div>

    <!-- Toast -->
    <div id="toast" class="toast" style="display: none;">
        <div class="toast-header">
            <strong class="me-auto">Notificación</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            <div id="toastContent"></div>
            <div class="spinner-border text-primary" id="spinner" role="status" style="display: none;">
                <span class="visually-hidden">Cargando...</span>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        console.log('jQuery está funcionando correctamente.');

        $('#loginForm').on('submit', function(event) {
            event.preventDefault();

            $('#toastContent').text('Iniciando sesión...');
            $('#spinner').show();
            $('#toast').toast({
                delay: 3000
            }).show();

            setTimeout(function() {
                $('#spinner').hide();

                const error = Math.random() < 0.5;

                if (error) {
                    $('#toastContent').text('Error al iniciar sesión.');
                    $('#toast').toast({
                        delay: 3000
                    }).show();
                } else {
                    $('#toastContent').text('Sesión iniciada con éxito!');
                    $('#toast').toast({
                        delay: 3000
                    }).show();

                }
            }, 2000);
        });
    });
    </script>
</body>

</html>