function animate_logo() {
	$("#logo1").animate({width: "100%", height: "100%"}, {duration: 2000, easing: "linear"});
	setTimeout("location.href='#menu1'", 3000);
}
function calcular() {
    var verif1 = document.getElementById("btn_calcular").innerHTML;
    //alert(verif1);
    var calculo = function() {
                    var num1 = parseFloat($("#monto").val());
                    var num2 = parseInt($("#cuota").val());
					var num3;
					if (num1 < 5000) {
						num3 = Math.round(num1+(num1*(48/100)));
					} else {
						num3 = Math.round(num1+(num1*(38/100)));
					}
                    var res = Math. round(num3 / num2);
                    $("#div_resultado").css("display", "block");
                    $("#resultado").val("$ "+res);
                    document.getElementById("btn_calcular").innerHTML = "NUEVO CÁLCULO";
                    };
    var reset = function() {
        //document.getElementById("btn_calcular").innerHTML = "CALCULAR";
        location.reload(true);
    };
   if ( verif1 === "CALCULAR") {
        calculo();
        } else {
        reset();
    }          
}
function salir() {
    navigator.app.exitApp();
}
function llenaDatosMP() {
	var datoMonto = document.getElementById("montodef").value;
	var datoPagar;
	if (parseInt(datoMonto) < 5000) {
						datoPagar = Math.round(parseInt(datoMonto)+(parseInt(datoMonto)*(48/100)));
					} else {
						datoPagar = Math.round(parseInt(datoMonto)+(parseInt(datoMonto)*(38/100)));
					}
	var datoNom = document.getElementById("usr_name").value;
	var datoDni = document.getElementById("usr_dni").value;
	var datoTel = document.getElementById("usr_tel").value;
	var datoMail = document.getElementById("usr_mail").value;
	var datoCbu = document.getElementById("usr_cbu").value;
	var datoCta = document.getElementById("usr_cuenta").value;
	var datoBco = document.getElementById("usr_banco").value;
	$("#nomapellido").val(datoNom);
	$("#numdoc").val(datoDni);
	$("#numtel").val(datoTel);
	$("#dir_mail").val(datoMail);
	$("#numcbu").val(datoCbu);
	$("#numcta").val(datoCta);
	$("#nombco").val(datoBco);
	$("#montoPedido").val("$ " + datoMonto);
	$("#totalPago").val("$ " + datoPagar);
}
function showConfirm() {
           navigator.notification.confirm(
              '¿Seguro que quieres cerrar la aplicación?', // mensaje a mostrar
              exitFromApp, // callback a invocar cuando el botón es presionado
              'Salir', // titulo de la ventana
              'Cancelar,Si' // etiquetas de los botones
           );
     }
function exitFromApp(buttonIndex) {
            if (buttonIndex==2){ navigator.app.exitApp();}
     }
function onBodyLoad() {
	document.addEventListener("deviceready",onDeviceReady,false);
}
function onDeviceReady() {
         
    }
