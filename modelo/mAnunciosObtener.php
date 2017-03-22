<?php

//define('SERVIDOR',$_SERVER['SERVER_NAME']);
define('SERVIDOR', 'www.migobierno.com');
define('CARPETA','/services/');
define('NOMBRESERVICIO', 'anuncios_rest.php');

$parametros = '?p=' . $_POST['pagealias'] .
    '/0' . $_POST['cityid'] .
    '/0' . $_POST['categoryid'].
    '/' . $_POST['countrycode'];

$url = SERVIDOR.CARPETA.NOMBRESERVICIO.$parametros;

// send request to resource
$client = curl_init($url);
// la siguiente linea nos permite obtener el resultado de curl_exec() y guardarlo en una variable.
// por defecto, curl_exec no regresa un resultado
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$respuesta_json = curl_exec($client);

echo $respuesta_json;

?>