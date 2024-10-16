<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?= base_url('application/assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('application/assets/css/registro.css'); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('application/assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('application/assets/js/popper.min.js'); ?>"></script>
    <script src="<?= base_url('application/assets/js/bootstrap.bundle.min.js'); ?>"></script>

</head>

<body>
    <div>
        <div class="card">
            <img class="mb-3" src="<?= base_url('application/assets/img/logo.png'); ?>" alt="Logo">
            <h5>Complete el formulario para registrarse</h5>
            <form id="registerForm">
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" required>
                </div>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono"
                        required>
                </div>
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
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-house"></i></span>
                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn w-100">Registrarse</button>
                <a href="<?= base_url('login'); ?>" class="register-link">¿Ya tienes cuenta? Inicia sesión aquí <i
                        class="bi bi-person-circle"></i></a>
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

        $('#registerForm').on('submit', function(event) {
            event.preventDefault();

            $('#toastContent').text('Registrando...');
            $('#spinner').show();
            $('#toast').toast({
                delay: 3000
            }).show();

            $.ajax({
                url: '<?= base_url("registro/crear"); ?>',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(response) {
                    $('#spinner').hide();

                    if (response.status === 'error') {
                        $('#toastContent').text(response.message);
                    } else {
                        $('#toastContent').text(response.message);

                        setTimeout(function() {
                            window.location.href = '<?= base_url("login"); ?>';
                        }, 1000);
                    }
                    $('#toast').toast({
                        delay: 3000
                    }).show();
                },
                error: function() {
                    $('#spinner').hide();
                    $('#toastContent').text('Error al procesar la solicitud.');
                    $('#toast').toast({
                        delay: 3000
                    }).show();
                }
            });
        });
    });
    </script>

</body>

</html>