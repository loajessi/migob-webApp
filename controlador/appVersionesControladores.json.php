<?php
header('Content-Type: application/json; charset=UTF-8');

/**
 * Archivo que publica las versiones actuales de los controladores,
 * para fines de la carga y actualización bajo demanda de versiones actualizadas
 */

$arrVersiones = array(
    'cBusqueda'            	    => 1.2,
    'cGenerales'           	    => 1.3,
    'cIndex'             	    => 1.1,
    'cEnEsteMes'           	    => 1.2,
    'cEventos'           	    => 1.2,
    'cCategoriasUrls'           => 1.1,
    'cFormularioContacto'       => 1,
    'cUltimo'  	                => 1.1,
    'cSuscripcionNewsLetter'  	=> 1
);

echo json_encode($arrVersiones);