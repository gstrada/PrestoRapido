<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require ("_lib/src/Exception.php");
	require ("_lib/src/PHPMailer.php");
	require ("_lib/src/SMTP.php");
	//Datos de conexión a la base de datos
	$servername = "localhost";
	$database = "guillete_prestora";
	$username = "guilletest";
	$password = "shock6060";

	//Seteo de variables con datos recibidos por AJAX
	$nombre = $_POST["usr_name_rec"];
	$cuil = $_POST["usr_cuil_rec"];
	$tel = $_POST["usr_tel_rec"];
	$email = $_POST["email_rec"];
	$tipo_emp = $_POST["tipoEmplead_rec"];
	$empleador = $_POST["usr_empleador_rec"];
	$sueldo = $_POST["usr_sueldo_rec"];
	$montoSol = $_POST["usr_monto_rec"];
	$cuotas = $_POST["usr_cuotas_rec"];
	$destino = $_POST["usr_destino_rec"];
	$fechaOtorgado = date('Y-m-d');

	//Seteo de consulta SQL
	$sql = "INSERT INTO solicitudes (nombreApellido, documento, correoElectronico, telefonoContacto, tipoEmpleado, empleador, ingresos, montoSolicitado, cantCuotaSolic, destinoPrestamo, fechaSolicitud) 
			VALUES ('{$nombre}', '{$cuil}', '{$email}', '{$tel}', '{$tipo_emp}', '{$empleador}', '{$sueldo}', '{$montoSol}','{$cuotas}', '{$destino}', '{$fechaOtorgado}')";

	//Apertura de conexión
	$conn = mysqli_connect($servername, $username, $password, $database);
	if (!$conn) {
      die("Connection failed: " . mysqli_connect_error()); //Error si no conecta
	}

	//Ejecución del insert y mensaje de éxito o error
	if (mysqli_query($conn, $sql)) {
		//echo "success";
	$mail = new PHPMailer(true);
	$mail2 = new PHPMailer(true);
	try {
    //Server settings
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'mail.prestorapido.com.ar';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admin@prestorapido.com.ar';                 // SMTP username
    $mail->Password = 'Pr3st0R4p1d0.c0m.4r';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
	$mail->CharSet = 'UTF-8';
    $mail->setFrom('admin@prestorapido.com.ar', 'Aviso de Operación');
    $mail->addAddress('guillermostrada@gmail.com', 'Administración');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Formulario de contacto para préstamo con recibo de sueldo.";
    $mail->Body    = "<h1>Datos de una nueva solicitud de información:</h1>
					  <br/>
					  <span>Monto Solicitado: $" .$montoSol."</span>
					  <br/>
					  <span>Cantidad de cuotas: ".$cuotas."</span>
					  <br/>
					  <span>Destino pr&eacute;stamo: ".$destino."</span>
					  <br/>
					  <span>Apellido y Nombre: ".$nombre."</span>
					  <br/>
					  <span>CUIL: ".$cuil."</span>
					  <br/>
					  <span>Empleador: ".$empleador."</span>
					  <br/>
					  <span>Ingresos: ".$sueldo."</span>
					  <br/>
					  <span>Correo Electr&oacute;nico: ".$email."</span>
					  <br/>
					  <span>Tel&eacute;fono: ".$tel."</span>
					  <br/>";
		  
    $mail->send();
    
	} catch (Exception $e) {
		
	}
	try {
    //Server settings
    $mail2->isSMTP();                                      // Set mailer to use SMTP
    $mail2->Host = 'mail.prestorapido.com.ar';  // Specify main and backup SMTP servers
    $mail2->SMTPAuth = true;                               // Enable SMTP authentication
    $mail2->Username = 'admin@prestorapido.com.ar';                 // SMTP username
    $mail2->Password = 'Pr3st0R4p1d0.c0m.4r';                           // SMTP password
    $mail2->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail2->Port = 465;                                    // TCP port to connect to

    //Recipients
	$mail->CharSet = 'UTF-8';
    $mail2->setFrom('admin@prestorapido.com.ar', 'Aviso!');
    $mail2->addAddress($email, $nombre);     // Add a recipient
    $mail2->isHTML(true);                                  // Set email format to HTML
    $mail2->Subject = 'Solicitud de contacto enviada';
    $mail2->Body    = "<h1>Gracias por operar con PRESTORAPIDO!</h1>
					  <br/>
					  <span>Dentro de las 24 hs h&aacute;biles nos comunicaremos con vos para informarte de las alternativas de préstamos.</span>
					  <br/>
					  ";
					  
    $mail2->send();
    
	} catch (Exception $e) {
		
	}
	} else {
		die('Error: ' . mysqli_error($conn));
	}

	mysqli_close($conn); //Cierre de conexión

?>