// con deviceready nos aseguramos que el dispositivo este listo para ser usado
$(document).on('deviceready', function(){	
	$(function(){
		$('#pagarMP').submit(function (){
			var postData = $(this).serialize();
			alert(postData);
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
					alert(dirURL);
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
	});
});

		