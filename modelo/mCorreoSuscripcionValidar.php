<?php
require('../services/lib/nusoap.php');
require('../modelo/mRutaServices.php');
//$msjConfirmarCorreo = "test";
if(isset($_GET['k']) && $_GET['k']!='')
{

    $hash=$_GET['k'];

    $urlServicio = $rutaServicios . "ConfirmarCorreo.php?wsdl";
//    $urlServicio = "http://52.11.96.21/prototipo/services/ConfirmarCorreo.php?wsdl";

    $nsCliente = new nusoap_client($urlServicio, 'wsdl');
    $nsProxy = $nsCliente->getProxy();
    $nsResultado = $nsProxy->ConfirmarCorreo($hash);

    $msjConfirmarCorreo .= $nsResultado;
}
else
    $msjConfirmarCorreo .= "Error: Información de validación no recibida";
?>