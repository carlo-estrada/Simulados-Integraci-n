<?php
    require_once "db/conn.php";
    require_once "db/inegi_config.php";

    // Valida que el municipio sea numérico antes de usarlo 
    $municipio = filter_input(INPUT_POST, 'municipio', FILTER_VALIDATE_INT);
    if ($municipio === null || $municipio === false) {
        echo json_encode(false);
        exit;
    }

    $stmt = mysqli_prepare($db_connection, "SELECT * FROM municipio WHERE idmunicipio = ?");
    if (!$stmt) {
        echo json_encode(['error' => 'Error en preparación: ' . mysqli_error($db_connection)]);
        exit;
    }
    
    mysqli_stmt_bind_param($stmt, "i", $municipio);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        echo json_encode(['error' => 'Error en consulta: ' . mysqli_error($db_connection)]);
        exit;
    }

    if ($result && ($row = mysqli_fetch_assoc($result))) {
        // Código de área INEGI: entidad (13) + clave de municipio de 3 dígitos
        $areaMunicipio = INEGI_ESTADO . str_pad($municipio, 3, '0', STR_PAD_LEFT);

        // Consulta la API de Indicadores del INEGI para población actual (estado y municipio)
        $poblacion_estado = obtenerIndicadorInegi(INEGI_INDICADOR_POBLACION, INEGI_ESTADO);
        $poblacion_municipio = obtenerIndicadorInegi(INEGI_INDICADOR_POBLACION, $areaMunicipio);
        $poblacion_indigena = obtenerIndicadorInegi(INEGI_INDICADOR_INDIGENA, $areaMunicipio);
        $poblacion_lgbtq = obtenerIndicadorInegi(INEGI_INDICADOR_LGBTQ, $areaMunicipio);
        $poblacion_joven = obtenerIndicadorInegi(INEGI_INDICADOR_POBLACION_JOVEN, $areaMunicipio);

        // Estructura del cabildo (presidente, síndicos, regidores) según la población del INEGI
        $cabildo = determinarEstructuraCabildo($poblacion_municipio);

        // Acciones afirmativas (personas con discapacidad) según la población del INEGI
        $acciones_afirmativas = determinarAccionesAfirmativas($poblacion_municipio);

        $row['poblacion_estado'] = $poblacion_estado;
        $row['poblacion_municipio'] = $poblacion_municipio;
        $row['tipo'] = determinarTipoMunicipio($poblacion_municipio, $poblacion_indigena);

        // Cabildo calculado con las funciones ya existentes
        $row['presidente'] = $cabildo['presidente'] ?? null;
        $row['sindicos'] = $cabildo['sindicos'] ?? null;
        $row['regidores'] = isset($cabildo['regidoresMR'], $cabildo['regidoresRP'])
            ? $cabildo['regidoresMR'] + $cabildo['regidoresRP']
            : null;
        $row['totalPlanilla'] = calcularTotalPlanilla($cabildo);
        $row['cabildo'] = $cabildo;

        // Acciones afirmativas y representación de minorías
        $row['personas_discapacidad'] = $acciones_afirmativas['personas_discapacidad'] ?? null;
        $row['personas_jovenes'] = calcularRepresentacionJoven($poblacion_municipio, $poblacion_joven);
        $row['diversidad_sexual'] = calcularRepresentacionLGBTQ($poblacion_municipio, $poblacion_lgbtq);
        $row['adscripcion_indigena'] = calcularRepresentacionIndigena($poblacion_municipio, $poblacion_indigena);

        echo json_encode($row, JSON_UNESCAPED_UNICODE);
    } else {
        echo json_encode(false);
    }
    mysqli_stmt_close($stmt);

    /**
     * Determina el tipo de municipio según la población indígena.
     * Se basa en el porcentaje de población autoadscritos indígenas.
     */
    function determinarTipoMunicipio($poblacion_total, $poblacion_indigena) {
        if ($poblacion_total === null || $poblacion_indigena === null) {
            return null;
        }

        $poblacion_total = (int) $poblacion_total;
        $poblacion_indigena = (int) $poblacion_indigena;
        
        if ($poblacion_total == 0) {
            return null;
        }

        $porcentaje_indigena = ($poblacion_indigena / $poblacion_total) * 100;

        if ($porcentaje_indigena >= 70) {
            return 'Municipio indígena';
        } elseif ($porcentaje_indigena >= 45) {
            return 'Municipio con representación indígena';
        } elseif ($porcentaje_indigena >= 20) {
            return 'Municipio con representación indígena';
        } else {
            return 'Municipio sin representación indígena';
        }
    }

    /**
     * Calcula la representación de población LGBTQ+ en fórmulas.
     * Disponible para registrar si la población LGBTQ+ es significativa.
     */
    function calcularRepresentacionLGBTQ($poblacion_total, $poblacion_lgbtq) {
        if ($poblacion_total === null || $poblacion_lgbtq === null) {
            return 'Sin_Obligacion';
        }

        $poblacion_total = (int) $poblacion_total;
        $poblacion_lgbtq = (int) $poblacion_lgbtq;
        
        if ($poblacion_total == 0) {
            return 'Sin_Obligacion';
        }

        $porcentaje_lgbtq = ($poblacion_lgbtq / $poblacion_total) * 100;

        // Si hay población LGBTQ+ significativa, está disponible para registrar
        if ($porcentaje_lgbtq >= 1) {
            return 'Disponible';
        } else {
            return 'Sin_Obligacion';
        }
    }

    /**
     * Calcula la representación de población joven en fórmulas.
     * Retorna el número de fórmulas para jóvenes.
     */
    function calcularRepresentacionJoven($poblacion_total, $poblacion_joven) {
        if ($poblacion_total === null || $poblacion_joven === null) {
            return 1;
        }

        $poblacion_total = (int) $poblacion_total;
        $poblacion_joven = (int) $poblacion_joven;
        
        if ($poblacion_total == 0) {
            return 1;
        }

        $porcentaje_joven = ($poblacion_joven / $poblacion_total) * 100;

        // Aumentar representación según porcentaje de jóvenes
        if ($porcentaje_joven >= 35) {
            return 2;
        } else if ($porcentaje_joven >= 25) {
            return 1;
        } else {
            return 1;
        }
    }

    /**
     * Calcula la representación indígena.
     * Retorna "disponible" o "sin_obligacion" según porcentaje.
     */
    function calcularRepresentacionIndigena($poblacion_total, $poblacion_indigena) {
        if ($poblacion_total === null || $poblacion_indigena === null) {
            return 'Sin_Obligacion';
        }

        $poblacion_total = (int) $poblacion_total;
        $poblacion_indigena = (int) $poblacion_indigena;
        
        if ($poblacion_total == 0) {
            return 'Sin_Obligacion';
        }

        $porcentaje_indigena = ($poblacion_indigena / $poblacion_total) * 100;

        // Si hay población indígena >= 20%, es disponible
        if ($porcentaje_indigena >= 20) {
            return 'Disponible';
        } else {
            return 'Sin_Obligacion';
        }
    }

    /**
     * Determina las acciones afirmativas según la población del municipio.
     * Define cuántas fórmulas deben estar reservadas para personas con discapacidad.
     */
    function determinarAccionesAfirmativas($poblacion) {
        if ($poblacion === null) {
            return null;
        }

        $poblacion = (int) $poblacion;

        return [
            'personas_discapacidad' => $poblacion > 50000 ? 2 : 1,
            'personas_jovenes' => 1,
            'personas_lgbtq' => $poblacion > 50000 ? 'Disponible' : 'Disponible',
            'personas_indigena' => 'Sin_Obligacion'
        ];
    }

    /**
     * Calcula el total de la planilla municipal.
     * totalPlanilla = presidente + síndicos + regidores
     */
    function calcularTotalPlanilla($cabildo) {
        if ($cabildo === null) {
            return null;
        }
        
        // Retorna el total del cabildo que ya incluye presidente + síndicos + regidores
        return $cabildo['total'];
    }

    /**
     * Determina la estructura (síndicos y regidores) según la población del municipio.
     * Se basa en las reglas de la ley electoral local de Hidalgo.
     */
    function determinarEstructuraCabildo($poblacion) {
        if ($poblacion === null) {
            return null;
        }

        $poblacion = (int) $poblacion;

        if ($poblacion < 30000) {
            // Población menos a 30,000
            // 1 síndico MR + 5 regidores MR + 4 regidores RP
            return [
                'presidente' => 1,
                'sindicos' => 1,
                'regidoresMR' => 5,
                'regidoresRP' => 4,
                'total' => 1 + 1 + 5 + 4
            ];
        } elseif ($poblacion >= 30000 && $poblacion <= 50000) {
            // Población 30,000 a 50,000
            // 1 síndico MR + 7 regidores MR + 5 regidores RP
            return [
                'presidente' => 1,
                'sindicos' => 1,
                'regidoresMR' => 7,
                'regidoresRP' => 5,
                'total' => 1 + 1 + 7 + 5
            ];
        } elseif ($poblacion > 50000 && $poblacion <= 100000) {
            // Población > 50,000 y ≤ 100,000
            // 1 síndico MR (hacienda) + 1 síndico de 1ª minoría (jurídico)
            // + 9 regidores MR + 6 regidores RP
            return [
                'presidente' => 1,
                'sindicos' => 2,
                'sindico_hacienda' => 1,
                'sindico_juridico' => 1,
                'regidoresMR' => 9,
                'regidoresRP' => 6,
                'total' => 1 + 2 + 9 + 6
            ];
        } else { // poblacion > 100000
            // Población > 100,000
            // 1 síndico MR (hacienda) + 1 síndico de 1ª minoría (jurídico)
            // + 11 regidores MR + 8 regidores RP
            return [
                'presidente' => 1,
                'sindicos' => 2,
                'sindico_hacienda' => 1,
                'sindico_juridico' => 1,
                'regidoresMR' => 11,
                'regidoresRP' => 8,
                'total' => 1 + 2 + 11 + 8
            ];
        }
    }

    /**
     * Obtiene el valor más reciente de cualquier indicador del INEGI,
     * usando un caché de 24 horas para evitar exceder el límite de peticiones.
     */
    function obtenerIndicadorInegi($indicador, $areaCode) {
        if (INEGI_API_TOKEN === 'TU_TOKEN_AQUI' || empty(INEGI_API_TOKEN)) {
            return null;
        }

        $cacheDir = __DIR__ . '/cache';
        if (!is_dir($cacheDir)) {
            mkdir($cacheDir, 0755, true);
        }
        $cacheFile = $cacheDir . '/inegi_' . $indicador . '_' . $areaCode . '.json';
        if (file_exists($cacheFile) && (time() - filemtime($cacheFile) < 86400)) {
            $cached = json_decode(file_get_contents($cacheFile), true);
            return $cached['valor'] ?? null;
        }

        $url = sprintf(
            'https://www.inegi.org.mx/app/api/indicadores/desarrolladores/jsonxml/INDICATOR/%s/es/%s/false/BISE/2.0/%s?type=json',
            $indicador,
            $areaCode,
            INEGI_API_TOKEN
        );

        $context = stream_context_create(['http' => ['timeout' => 8, 'ignore_errors' => true]]);
        $response = @file_get_contents($url, false, $context);

        if ($response === false) {
            return null;
        }

        $data = json_decode($response, true);
        $valor = $data['Series'][0]['OBSERVATIONS'][0]['OBS_VALUE'] ?? null;

        if ($valor !== null) {
            file_put_contents($cacheFile, json_encode(['valor' => $valor]));
        }

        return $valor;
    }




?>