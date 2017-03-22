<?php

//define('SERVIDOR',$_SERVER['SERVER_NAME']);
define('SERVIDOR', 'www.migobierno.com');
define('CARPETA', '/services/');
define('NOMBRESERVICIO', 'ciudades.php');

$ciudadBuscar = urlencode($_GET['term']);

$parametros = "?p=" . $ciudadBuscar .
    "/" . $_GET['pPais_ID'];

$url = SERVIDOR . CARPETA . NOMBRESERVICIO . $parametros;

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$respuesta_json = curl_exec($client);

$respuesta_array = json_decode($respuesta_json, true);
$arrSalida = array();

if ($respuesta_array['Estado'] == 'OK') {
    $i = 0;
    foreach ($respuesta_array['Datos'] as $ciudadDatos) {
        $arrSalida[$i]['value'] = $ciudadDatos['Nombre_Ciudad'] . ', ' .
            $ciudadDatos['Estado_Abreviatura'];
        $arrSalida[$i]['id'] = $ciudadDatos['Ciudad_ID'];
        $i++;
    }
}

echo json_encode($arrSalida);

?>