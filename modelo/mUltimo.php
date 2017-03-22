<?php

//define('SERVIDOR',$_SERVER['SERVER_NAME']);
define('SERVIDOR', 'www.migobierno.com/services/');
define('NOMBRESERVICIO', 'ultimo.php');

$parametros = "?p=USA";

$url = SERVIDOR . NOMBRESERVICIO . $parametros;

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$respuesta_json = curl_exec($client);

echo $respuesta_json;

?>