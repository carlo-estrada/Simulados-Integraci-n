<?php
	$db_host = '127.0.0.1';
	$db_user = 'root';
	$db_password = '21011765p';
	$db_name = 'dbpostulaciones2023';
	$db_port = 3306;

	if (!extension_loaded('mysqli')) {
	    die('La extensión MySQLi no está habilitada en PHP. Activa la extensión mysqli en php.ini.');
	}

	$db_connection = @mysqli_connect($db_host, $db_user, $db_password, $db_name, $db_port);
	if (!$db_connection) {
	    http_response_code(500);
	    die('No se ha podido conectar a la base de datos: ' . mysqli_connect_error());
	}

	mysqli_set_charset($db_connection, 'utf8mb4');
?>