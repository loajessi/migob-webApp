<?php

// El siguiente codigo obtiene el nombre del servidor web desde donde se ejecuta este script

$servidor = $_SERVER["HTTP_HOST"];



$rutaServicios = "http://".$servidor."/services/";

$rutaModelo = "http://".$servidor."/modelo/";

$rutaVista = "http://".$servidor."/vista/";

