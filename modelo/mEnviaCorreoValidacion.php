<?php

//define('SERVIDOR',$_SERVER['SERVER_NAME']);
define('SERVIDOR', 'www.migobierno.com');
//define('SERVIDOR', 'http://salas-dev.migobierno.com');

define('CARPETA', '/services/');
define('NOMBRESERVICIO', 'ValidarCorreoNewsLetter.php');

$parametros = "?p=" .$_REQUEST['email'];
              

$url = SERVIDOR . CARPETA . NOMBRESERVICIO . $parametros;

$client = curl_init($url);
curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
$respuesta_json = curl_exec($client);

echo $respuesta_json;
/*	
	
// CODIGO ORIGINAL EN NUASOAP	
require('../services/lib/nusoap.php');
require('mRutaServices.php');
$email=$_REQUEST['email'];


$urlServicio = $rutaServicios."ValidarCorreoNewsLetter.php?wsdl";

$nsCliente = new nusoap_client($urlServicio, 'wsdl');
$nsProxy = $nsCliente->getProxy();
$nsResultado = $nsProxy->ValidarCorreo($email);


echo $nsResultado;
*/


	
?>