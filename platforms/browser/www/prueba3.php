<?php
require_once "mercadopago.php";
//Seteo de variables
$montoOriginal ="";
$montoCredito = "123";
$nombreCompleto = "fddfg";
$documento = "453455";
$telefonoContacto = "453535";
$correoElectronico = "gfdgff@hghjfg";
$claveCBU = "44444444444444";
$nroCuenta = "444444";
$nombreBanco = "mdr";
$fechaOperacion = date('Y-m-d');;

//Conexión a BD
$servername = "localhost";
$database = "guillete_prestora";
$username = "guilletest";
$password = "shock6060";

//Seteo de INSERT
$insert = "INSERT INTO prestamos (montoSolicitado, montoOtorgado, fechaOtorgado, nombreApellido, documento, correoElectronico, telefonoContacto, numeroCbu, numeroCuenta, nombreBanco) 
 			VALUES ('{}', '{$montoCredito}', '{$fechaOperacion}', '{$nombreCompleto}', '{$documento}', '{$correoElectronico}', '{$telefonoContacto}', '{$claveCBU}', '{$nroCuenta}', '{$nombreBanco}')";

//Apertura de conexión
$conn = mysqli_connect($servername, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error()); //Error si no conecta
}

//Ejecución del insert y mensaje de éxito o error
if (!mysqli_query($conn, $insert)) {
	die('Error: ' . mysqli_error($conn));
} else {
	echo "Exito";
	$idPrestamo = mysqli_insert_id($conn);
	echo $idPrestamo;	
	mysqli_close($conn); //Cierre de conexión

}
?>