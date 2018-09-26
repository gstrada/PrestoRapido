<?php
require_once "mercadopago.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require ("_lib/src/Exception.php");
require ("_lib/src/PHPMailer.php");
require ("_lib/src/SMTP.php");
	
//Seteo de variables
<<<<<<< HEAD
=======
$montoOriginal = $_POST["montoPedido"];
$montoCredito = $_POST["totalPago"];
>>>>>>> 60891531c7416f42ad8745f22a89251d78928fae
$nombreCompleto = $_POST["nomapellido"];
$documento = $_POST["numdoc"];
$telefonoContacto = $_POST["numtel"];
$correoElectronico = $_POST["dir_mail"];
$claveCBU = $_POST["numcbu"];
$nroCuenta = $_POST["numcta"];
$nombreBanco = $_POST["nombco"];
$montoOriginal = $_POST["montoPedido"];
if (intval(substr($montoOriginal,2)) < 5000) {
	$montoCInt = "$ ".strval(intval(substr($montoOriginal,2))+(intval(substr($montoOriginal,2))*0.48));
} else {
	$montoCInt = "$ ".strval(intval(substr($montoOriginal,2))+(intval(substr($montoOriginal,2))*0.38));
}

//$montoCInt = $_POST["totalPago"];

$fechaOperacion = date('Y-m-d');

//Conexión a BD
$servername = "localhost";
$database = "guillete_prestora";
$username = "guilletest";
$password = "shock6060";

//Seteo de INSERT
$insert = "INSERT INTO prestamos (montoSolicitado, montoOtorgado, fechaOtorgado, nombreApellido, documento, correoElectronico, telefonoContacto, numeroCbu, numeroCuenta, nombreBanco) 
<<<<<<< HEAD
 			VALUES ('{$montoOriginal}', '{$montoCInt}', '{$fechaOperacion}', '{$nombreCompleto}', '{$documento}', '{$correoElectronico}', '{$telefonoContacto}', '{$claveCBU}', '{$nroCuenta}', '{$nombreBanco}')";
=======
 			VALUES ('{$montoOriginal}', '{$montoCredito}', '{$fechaOperacion}', '{$nombreCompleto}', '{$documento}', '{$correoElectronico}', '{$telefonoContacto}', '{$claveCBU}', '{$nroCuenta}', '{$nombreBanco}')";
>>>>>>> 60891531c7416f42ad8745f22a89251d78928fae

//Apertura de conexión
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " .mysqli_connect_error()); //Error si no conecta
}

//Ejecución del insert y mensaje de éxito o error
if (!mysqli_query($conn, $insert)) {
	die('Error: ' .mysqli_error($conn));
} else {
	
	//$idPrestamo = mysqli_insert_id($conn);
	//echo $idPrestamo;	
	mysqli_close($conn); //Cierre de conexión
<<<<<<< HEAD
	
	//Envío de datos por mail
	$mail = new PHPMailer(true);

	try {
		//Server settings
		$mail->isSMTP();  
		//$mail->SMTPDebug = 2;// Set mailer to use SMTP
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
		$mail->isHTML(true);
		// Set email format to HTML
		$mail->Subject = "Ha ingresado una nueva solicitud de préstamo";
		$mail->Body    = "<h1>Datos de una nueva solicitud de pr&eacute;stamo:</h1>
						  <br/>
						  <span>Monto Solicitado: " .$montoOriginal."</span>
						  <br/>
						  <span>Monto abonado: ".$montoCInt."</span>
						  <br/>
						  <span>Apellido y Nombre: ".$nombreCompleto."</span>
						  <br/>
						  <span>DNI: ".$documento."</span>
						  <br/>
						  <span>Correo Electr&oacute;nico: ".$correoElectronico."</span>
						  <br/>
						  <span>Tel&eacute;fono: ".$telefonoContacto."</span>
						  <br/>
						  <span>CBU para dep&oacute;sito: ".$claveCBU."</span>
						  <br/>
						  <span>N° de cuenta: ".$nroCuenta."</span>
						  <br/>
						  <span>Banco: ".$nombreBanco."</span>
						  <br/>";

		$mail->send();

		} catch (Exception $e) {
			//echo "error".$e;	
		}	
	
	$precio = floatval(substr($montoCInt,2));
	
	$mp = new MP ("278713874223612", "LRKPrRY6kAtOVITp4n5guKyWlM9rgXpI");
	$preference_data = array(
		"items" => array(
			array(
				"title" => "VARIOS",
				"quantity" => 1,
				"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
				"unit_price" => $precio
			)
		)
	);

	$preference = $mp->create_preference ($preference_data);
	echo json_encode($preference ['response']['sandbox_init_point'], JSON_FORCE_OBJECT);
=======
>>>>>>> 60891531c7416f42ad8745f22a89251d78928fae
	
	//Envío de datos por mail
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	
	require ("_lib/src/Exception.php");
	require ("_lib/src/PHPMailer.php");
	require ("_lib/src/SMTP.php");
	$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->isSMTP();  
    //$mail->SMTPDebug = 2;// Set mailer to use SMTP
    $mail->Host = 'mail.prestorapido.com.ar';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'admin@prestorapido.com.ar';                 // SMTP username
    $mail->Password = 'Pr3st0R4p1d0.c0m.4r';                           // SMTP password
    $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('admin@prestorapido.com.ar', 'Aviso de Operacion');
    $mail->addAddress('guillermostrada@gmail.com', 'Administracion');     // Add a recipient
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = "Ha ingresado una nueva solicitud de pr&eacute;stamo";
    $mail->Body    = "<h1>Datos de una nueva solicitud de pr&eacute;stamo:</h1>
					  <br/>
					  <span>Monto Solicitado: $" .$montoOriginal."</span>
					  <br/>
					  <span>Monto a depositar: $".$montoCredito."</span>
					  <br/>
					  <span>Apellido y Nombre: ".$nombreCompleto."</span>
					  <br/>
					  <span>DNI: ".$documento."</span>
					  <br/>
					  <span>Correo Electr&oacute;nico: ".$correoElectronico."</span>
					  <br/>
					  <span>Tel&eacute;fono: ".$telefonoContacto."</span>
					  <br/>
					  <span>CBU para dep&oacute;sito: ".$claveCBU."</span>
					  <br/>
					  <span>N° de cuenta: ".$nroCuenta."</span>
					  <br/>
					  <span>Banco: ".$nombreBanco."</span>
					  <br/>";
		  
    $mail->send();
    
	} catch (Exception $e) {
	    echo "error".$e;	
	}
	
	
	
	
	$precio = floatval(substr($montoCredito,2));
	
	$mp = new MP ("278713874223612", "LRKPrRY6kAtOVITp4n5guKyWlM9rgXpI");
	$preference_data = array(
		"items" => array(
			array(
				"title" => "VARIOS",
				"quantity" => 1,
				"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
				"unit_price" => $precio
			)
		)
	);

	$preference = $mp->create_preference ($preference_data);
	echo json_encode($preference ['response']['init_point'], JSON_FORCE_OBJECT);
	
	
}

public function enviaMail() {
	
}

?>