<?php
require_once "mercadopago.php";
//Seteo de variables
$montoOriginal = $_POST["montoPedido"];
$montoCredito = $_POST["totalPago"];
$nombreCompleto = $_POST["nomapellido"];
$documento = $_POST["numdoc"];
$telefonoContacto = $_POST["numtel"];
$correoElectronico = $_POST["dir_mail"];
$claveCBU = $_POST["numcbu"];
$nroCuenta = $_POST["numcta"];
$nombreBanco = $_POST["nombco"];
$fechaOperacion = date('Y-m-d');;

//Conexión a BD
$servername = "localhost";
$database = "guillete_prestora";
$username = "guilletest";
$password = "shock6060";

//Seteo de INSERT
$insert = "INSERT INTO prestamos (montoSolicitado, montoOtorgado, fechaOtorgado, nombreApellido, documento, correoElectronico, telefonoContacto, numeroCbu, numeroCuenta, nombreBanco) 
 			VALUES ('{$montoOriginal}', '{$montoCredito}', '{$fechaOperacion}', '{$nombreCompleto}', '{$documento}', '{$correoElectronico}', '{$telefonoContacto}', '{$claveCBU}', '{$nroCuenta}', '{$nombreBanco}')";

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
	
	//Envío de datos por mail
	
	require("_lib/src/PHPMailer.php");
    $mail = new PHPMailer();
	
	
	
	
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