<?php
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
		echo "success";
	} else {
		die('Error: ' . mysqli_error($conn));
	}

	mysqli_close($conn); //Cierre de conexión

?>