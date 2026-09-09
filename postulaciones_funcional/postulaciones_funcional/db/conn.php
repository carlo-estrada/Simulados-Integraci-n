<?php
if (!function_exists('app_env')) {
    function app_env($key, $default = null) {
        $value = getenv($key);
        if ($value === false || $value === '') {
            $value = $_ENV[$key] ?? $default;
        }
        return $value === false ? $default : $value;
    }
}

$db_host = app_env('DB_HOST', '127.0.0.1');
$db_user = app_env('DB_USER', 'root');
$db_password = app_env('DB_PASSWORD', '');
$db_name = app_env('DB_NAME', 'dbpostulaciones2023');
$db_port = (int) app_env('DB_PORT', 3306);

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