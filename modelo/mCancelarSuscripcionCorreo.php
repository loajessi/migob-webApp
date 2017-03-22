<?php
require('../services/lib/nusoap.php');
require('mRutaServices.php');
//$msjConfirmarCorreo = "test";
if(isset($_GET['k']) && $_GET['k']!='')
{

    $hash=$_GET['k'];

    $urlServicio = $rutaServicios . "CancelarSuscripcionCorreo.php?wsdl";
//    $urlServicio = "http://52.11.96.21/prototipo/services/ConfirmarCorreo.php?wsdl";

    $nsCliente = new nusoap_client($urlServicio, 'wsdl');
    $nsProxy = $nsCliente->getProxy();
    $nsResultado = $nsProxy->CancelarSuscripcionCorreo($hash);

    $msjConfirmarCorreo .= $nsResultado;
}
else
    $msjConfirmarCorreo .= "Error: Información de validación no recibida";
?>