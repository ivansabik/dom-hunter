<?php

# Valida número de guía y código de rastreo
function valida($tipo) {
    if ($tipo == 'guia') {
        # 22 y alfanumérico
        if (strlen($_GET['numero']) != 22)
            return false;
        if (!ctype_alnum($_GET['numero'])) {
            return false;
        }
        return true;
    }
    if ($tipo == 'rastreo') {
        # 10 y numérico
        if (strlen($_GET['numero']) != 10)
            return false;
        if (!is_numeric($_GET['numero']))
            return false;
        return true;
    }
}

# Valida cada campo de la respuesta y reemplaza si está mal
function limpiaRespuesta($respuesta) {
    // numero de guia ya se validó
    // codigo de rastreo ya se validó
    // Tipo de servicio
    // Fecha programada de entrega, fecha de recoleccion, fecha de entrega
    /*
      if(!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $respuesta["fecha_programada"]))
      $respuesta["fecha_programada"] = "";
      if(!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $respuesta["fecha_recoleccion"]))
      $respuesta["fecha_recoleccion"] = "";
      if(!preg_match('/^\d{1,2}\/\d{1,2}\/\d{4}$/', $respuesta["fecha_entrega"]))
      $respuesta["fecha_entrega"] = "";
     */
    // Nombre origen, destino
    if ($respuesta["origen"]["latitud"] == "")
        $respuesta["origen"]["nombre"] = "";
    if ($respuesta["destino"]["latitud"] == "")
        $respuesta["destino"]["nombre"] = "";
    // Coordenadas origen y destino ya se validaron
    // codigo postal destino
    if (!preg_match('/[0-9][0-9][0-9][0-9][0-9]/', $respuesta["destino"]["codigo_postal"]))
        $respuesta["destino"]["codigo_postal"] = "";
    // Estatus envio
    return $respuesta;
}

/**
 * Indents a flat JSON string to make it more human-readable.
 *
 * @param string $json The original JSON string to process.
 *
 * @return string Indented version of the original JSON string.
 */
function indent($json) {

    $result      = '';
    $pos         = 0;
    $strLen      = strlen($json);
    $indentStr   = '  ';
    $newLine     = "\n";
    $prevChar    = '';
    $outOfQuotes = true;

    for ($i=0; $i<=$strLen; $i++) {

        // Grab the next character in the string.
        $char = substr($json, $i, 1);

        // Are we inside a quoted string?
        if ($char == '"' && $prevChar != '\\') {
            $outOfQuotes = !$outOfQuotes;
        
        // If this character is the end of an element, 
        // output a new line and indent the next line.
        } else if(($char == '}' || $char == ']') && $outOfQuotes) {
            $result .= $newLine;
            $pos --;
            for ($j=0; $j<$pos; $j++) {
                $result .= $indentStr;
            }
        }
        
        // Add the character to the result string.
        $result .= $char;

        // If the last character was the beginning of an element, 
        // output a new line and indent the next line.
        if (($char == ',' || $char == '{' || $char == '[') && $outOfQuotes) {
            $result .= $newLine;
            if ($char == '{' || $char == '[') {
                $pos ++;
            }
            
            for ($j = 0; $j < $pos; $j++) {
                $result .= $indentStr;
            }
        }
        
        $prevChar = $char;
    }

    return $result;
}

# http://erlycoder.com/45/php-server-side-geocoding-with-google-maps-api-v3
class geocoder {

    static private $url = "http://maps.google.com/maps/api/geocode/json?sensor=false&address=";

    static public function getLocation($address) {
        $url = self::$url . urlencode($address);

        $resp_json = self::curl_file_get_contents($url);
        $resp = json_decode($resp_json, true);

        if ($resp['status'] = 'OK') {
            return $resp['results'][0]['geometry']['location'];
        } else {
            return false;
        }
    }

    static private function curl_file_get_contents($URL) {
        $c = curl_init();
        curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($c, CURLOPT_URL, $URL);
        $contents = curl_exec($c);
        curl_close($c);

        if ($contents)
            return $contents;
        else
            return FALSE;
    }

}
?>
