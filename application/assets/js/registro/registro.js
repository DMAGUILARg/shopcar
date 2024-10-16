$(document).ready(function () {
	console.log('jQuery está funcionando correctamente.');

	$('#registerForm').on('submit', function (event) {
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
			success: function (response) {
				$('#spinner').hide();

				if (response.status === 'error') {
					$('#toastContent').text(response.message);
				} else {
					$('#toastContent').text(response.message);

					setTimeout(function () {
						window.location.href = '<?= base_url("login"); ?>';
					}, 1000);
				}
				$('#toast').toast({
					delay: 3000
				}).show();
			},
			error: function () {
				$('#spinner').hide();
				$('#toastContent').text('Error al procesar la solicitud.');
				$('#toast').toast({
					delay: 3000
				}).show();
			}
		});
	});
});
