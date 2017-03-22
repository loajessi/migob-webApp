<?php

//define('SERVIDOR',$_SERVER['SERVER_NAME']);
define('SERVIDOR', 'www.migobierno.com');
define('CARPETA', '/services/');
define('NOMBRESERVICIO', 'enestemes.php');

$parametros = "?p=". $_POST['pPagina_ID'] .
    "/0" . $_POST['pCiudad_ID'] .
    "/" . $_POST['pPais_ID'];

$url = SERVIDOR . CARPETA . NOMBRESERVICIO . $parametros;

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$respuesta_json = curl_exec($client);

echo $respuesta_json;

?>