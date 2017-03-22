<?php

require('../services/lib/nusoap.php');
require('mRutaServices.php');

$urlServicio = $rutaServicios . "obtener_urls_subcategoria.php?wsdl";

$nsCliente = new nusoap_client($urlServicio, 'wsdl');
$nsProxy = $nsCliente->getProxy();
$nsResultado = $nsProxy->ExtraerDatos(
    $_POST['pIdCategoria'],
    $_POST['pIdSubCategoria'],
    $_POST['pCiudad_ID'],
    $_POST['pMunicipio_ID'],
    $_POST['pEstado_ID'],
    $_POST['pPais_ID']
);

if(empty($nsResultado)){
    echo null;
    exit;
}

$arrSalida = array();
$arrItem = $nsResultado['item'];

foreach ($arrItem as $llaveFila => $fila) {
   if(count($fila) == 1)
       $arrSalida[0][$llaveFila] = utf8_encode($fila);
   else{
       foreach ($fila as $llaveColumna => $valor) {
           $arrSalida[$llaveFila][$llaveColumna] = utf8_encode($valor);
       }
   }
}

echo json_encode($arrSalida);

?>