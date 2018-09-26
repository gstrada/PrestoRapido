// con deviceready nos aseguramos que el dispositivo este listo para ser usado
$(document).on('deviceready', function(){	
	$(function(){
		$('#pagarMP').submit(function (){
			var postData = $(this).serialize();
			$.ajax({
                type: 'POST',
                data: postData,
                // cargamos la url del servidor externo
                url: 'http://209.126.127.32/~guilletest/creaSolicPago.php',
                success: function(data){
                    console.log(data);
                    $('#usr_name').val('');
					$('#usr_dni').val('');
					$('#usr_tel').val('');
					$('#usr_mail').val('');
					$('#usr_cbu').val('');
					$('#usr_cuenta').val('');
					$('#usr_banco').val('');
					$('#montodef').val('');
					var dirURL = JSON.parse(data);
					//alert(postData);
					document.location.href = '#menu1';
					var ref = window.open(dirURL, '_blank', 'location=yes');
					ref.addEventListener('loadstart', function() { alert('start: ' + event.url); });
					ref.addEventListener('loadstop', function() { alert('stop: ' + event.url); });
					ref.addEventListener('exit', function() { alert(event.type); });
                },
                error: function(data){
                    console.log(data);
                    alert('Ocurrio un error al enviar tus datos');
                }
            });	
			return false;
	   	});
		
		$('#datosContacto').submit(function(){
            //var dataID = $(this).parent().attr('data-datos-id');
            var postData = $(this).serialize();
            $.ajax({
                type: 'POST',
                data: postData,
                // cargamos la url del servidor externo
                url: 'http://209.126.127.32/~guilletest/grabaForm.php',
                success: function(data){
                    console.log(data);
                    $('#usr_name_rec').val('');
					$('#usr_cuil_rec').val('');
					$('#usr_tel_rec').val('');
					$('#email_rec').val('');
					$('#tipoEmplead_rec').val('');
					$('#usr_empleador_rec').val('');
					$('#usr_sueldo_rec').val('');
					$('#usr_monto_rec').val('');
					$('#usr_cuotas_rec').val('');
					$('#usr_destino_rec').val('');
                    alert('Tus datos fueron enviados');
					document.location.href = '#menu1';
                },
                error: function(data){
                    console.log(data);
                    alert('Ocurrio un error al enviar tus datos');
                }
            });
            return false;
        });
	});
});

		