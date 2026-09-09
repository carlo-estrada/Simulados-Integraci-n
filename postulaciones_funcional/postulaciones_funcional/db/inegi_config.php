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

// Configuración para la API de Indicadores del INEGI
define('INEGI_API_TOKEN', app_env('INEGI_API_TOKEN', ''));

// Verifica las Consultas del INEGI si tu cuenta usa otro catálogo.
define('INEGI_INDICADOR_POBLACION', app_env('INEGI_INDICADOR_POBLACION', '1002000001'));
define('INEGI_INDICADOR_INDIGENA', app_env('INEGI_INDICADOR_INDIGENA', '6207019014'));  // Población indígena
define('INEGI_INDICADOR_LGBTQ', app_env('INEGI_INDICADOR_LGBTQ', '6207133067'));  // Población LGBTQ+
define('INEGI_INDICADOR_POBLACION_JOVEN', app_env('INEGI_INDICADOR_POBLACION_JOVEN', '1002000070,1002000073'));  // Población joven

// Clave de entidad federativa de Hidalgo
define('INEGI_ESTADO', app_env('INEGI_ESTADO', '13'));
?>
