<!DOCTYPE html>
<html>
<head>
    <title>Migobierno.com - Servicios e Información Gobierno Estados Unidos</title>
    <meta http-equiv="Cache-Control" content="no-store"/>
    <meta http-equiv="Pragma" content="no-store"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="description"
          content="Portal web que ofrece información sobre los servicios de gobierno de Estados Unidos en Español">

    <link rel="stylesheet" href="http://www.migobierno.com/_estilo/w3.css" type="text/css">
    <link rel="stylesheet" href="/_estilo/font-awesome/css/font-awesome.min.css"
          type="text/css">
    <link rel="stylesheet" href="/_estilo/mgestilo.css?v=<?= rand(); ?>" type="text/css">
    <link rel="stylesheet" href="/_lib/jquery-ui-1.12.1/jquery-ui.css">
    <link rel="stylesheet" href="/_lib/sweetalert/dist/sweetalert.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel='stylesheet' href="/_componentes/camera/css/camera.css" type="text/css"
          id="camera-css" media="all">
</head>

<body class="w3-content" style="max-width:1300px">

<!-- Sidenav/menu -->
<nav id="navBarraMenu" class="w3-sidenav w3-white w3-hide-large" style="z-index:3;width:300px; display: none"></nav>

<!-- Efecto para abrir la barra de menú en pantallas pequeñas -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="navBar_close()" style="cursor:pointer"
     title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main">

    <!-- Header -->
    <header id="hEncabezadoM" class="w3-container w3-padding-4 w3-white w3-top w3-hide-large w3-hide-medium">
        <div style="display: table; padding: 5px">
            <div style="display: table-row">
                <div style="display: table-cell; vertical-align: top; width: 10%">
                    <span class="w3-opennav w3-xlarge w3-hover-text-grey" onclick="navBar_open()"><i
                            class="fa fa-bars"></i></span>
                </div>
                <div style="display: table-cell; vertical-align: top; width: 30%; padding-left: 10px">
                    <a href="/index.php"><img src="/imagenes/LogotipoMiGobiernocomMovil.png"
                                              style="width:78px; height: 70px"></a>

                </div>
                <div style="display: table-cell; vertical-align: middle; width: 60%;">
                    <div class="ui-widget" style="padding-left: 5px">
                        <input class="w3-input w3-border w3-border-blue w3-show-inline-block" id="listaCiudadesM"
                               placeholder="Ingresa tu ciudad">&nbsp;
                        <div class=" w3-show-inline-block"><i class="fa fa-map-marker fa-lg"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <header id="hEncabezado" class="w3-container w3-padding-4 w3-white w3-top w3-hide-small">
        <div class="w3-row">
            <div class="w3-container w3-third">
                <a href="/index.php"><img src="/imagenes/LogotipoMiGobiernocom.png"
                                 style="width:90%; height: 120px"></a>
            </div>
            <div class="w3-container w3-third w3-center">
                <div style="display: table; width: 100%; height: 119px">
                    <div style="display: table-cell; vertical-align: middle">
                        <div class="ui-widget">
                            <i class="fa fa-map-marker fa-2x fa-pull-right w3-show-inline-block"></i>
                            <input class="w3-input w3-border w3-border-blue w3-show-inline-block" id="listaCiudades"
                                   placeholder="Ingresa tu ciudad">
                        </div>
                    </div>
                </div>
            </div>
            <div class="w3-container w3-third w3-center">
                <div style="display: table; width: 100%; height: 119px">
                    <div class="notaHeaderText" style="display: table-cell; vertical-align: middle">NO SOMOS UNA
                        AGENCIA DE GOBIERNO<br><br>

                        <div>
                            <a href="https://www.facebook.com/migobierno/" title="facebook" target="_blank">
                                <i class="fa fa-facebook-square fa-2x w3-show-inline-block w3-hover-text-theme-red"></i>
                            </a>&nbsp;
                            <a href="http://twitter.com/migobiernocom" title="twitter" target="_blank">
                                <i class="fa fa-twitter-square fa-2x w3-show-inline-block w3-hover-text-theme-red"></i>
                            </a>&nbsp;
                            <a href="https://www.youtube.com/channel/UCX_fqyxWeBElivzmN395i4Q" title="youtube"
                               target="_blank">
                                <i class="fa fa-youtube-square fa-2x w3-show-inline-block w3-hover-text-theme-red"></i>
                            </a>&nbsp;
                            <a href="https://www.instagram.com/migobiernocom/" title="instagram"
                               target="_blank">
                                <i class="fa fa-instagram fa-2x w3-show-inline-block w3-hover-text-theme-red"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--  <div class="w3-section btnBar">-->

          <div class="w3-container btnBar">
            <a class="w3-btn w3-border-right w3-padding-medium w3-hover-text-theme-blue btnBar"
               href="/index.php">Inicio
            </a>
            <a class="w3-btn w3-border-right w3-padding-medium w3-hover-text-theme-blue btnBar"
               href="/en-este-mes/">En este mes
            </a>
            <a class="w3-btn w3-border-right w3-padding-medium w3-hover-text-theme-blue btnBar"
               href="/eventos/">Eventos
            </a>
            <a class="w3-btn w3-border-right w3-padding-medium w3-hover-text-theme-blue btnBar"
               href="/quienes-somos/">Quiénes somos
            </a>
            <a class="w3-btn w3-padding-medium w3-hover-text-theme-blue btnBar"
               href="/contactanos">Contáctanos
            </a>

            <div class="w3-right w3-padding-small">
                <form id="frmBuscar" method="post" action="/buscar/">
                    <input type="text" name="txtBuscarEnSitio" id="txtBuscarEnSitio" size="20" required/>
                    <input type="submit" class="w3-btn w3-round w3-theme-blue w3-hover-theme-red w3-textBtn-theme-blue"
                           value="BUSCAR"/>
                </form>
            </div>
        </div>

    </header>
</div>