<?php
require('../services/lib/nusoap.php');
require('mRutaServices.php');
//$msjConfirmarCorreo = "test";





   

    $urlServicio = $rutaServicios."enviarCorreoContacto.php?wsdl";

	//echo $urlServicio;
	$nsCliente = new nusoap_client($urlServicio, 'wsdl');
	$nsProxy = $nsCliente->getProxy();
	$mensaje = $nsProxy->enviarCorreoContacto($_POST['nombre'],$_POST['email'],$_POST['telefono'],$_POST['direccion'],$_POST['mensaje']);




    echo $mensaje;
?>