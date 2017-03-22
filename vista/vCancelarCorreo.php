<?php
    header('Content-Type: text/html; charset=UTF-8');
	require('../modelo/mCancelarSuscripcionCorreo.php');
//require('mRutaServices.php');

?>
<!DOCTYPE html>
<html>
<head>
    <title>Migobierno.com - Cancelación de Suscripcion a lista de Correo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    
    <meta name="description" content="Servicios e información del gobierno de los Estados Unidos de América.">
    <meta name="keywords" content="Gobierno, Mi Gobierno.com, migobierno.com, Estados Unidos, Servicios, Información, USA, EUA, EEUU, EE.UU.">

    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <link rel="stylesheet" href="../_estilo/mgestilo.css" type="text/css">
</head>

<body class="w3-content" style="max-width:1300px">
<!-- !PAGE CONTENT! -->
<div class="w3-main">

    <!-- Header -->
    <header id="hEncabezado" class="w3-container w3-padding-large w3-white">
        <div class="w3-row-padding">
            <div class="w3-container w3-third">
                <a href="index.html"><img src="../imagenes/LogotipoMiGobiernocom.png" style="width:100%"></a>
            </div>
            <div class="w3-container w3-third w3-center">
                <div style="display: table; width: 100%; height: 85px"></div>
            </div>
            <div class="w3-container w3-third w3-hide-small w3-center">
                <div style="display: table; width: 100%; height: 85px">
                    <div class="notaHeaderText" style="display: table-cell; vertical-align: bottom">NO SOMOS UNA
                        AGENCIA DE GOBIERNO
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div style="height: 50px" class="w3-theme-grey-d4 w3-padding-16">
    </div>
    <!-- Content -->
    <div style="display: table; width: 100%; height: 450px">
        <div class="notaHeaderText" style="display: table-cell; vertical-align: middle">
            <p class="w3-center w3-xxlarge">			   
                <i class="fa fa-envelope-o"></i>&nbsp;<?= $msjConfirmarCorreo; ?>
            </p>
            <p class="w3-large w3-center w3-hover-text-theme-red">
                <a href="index.html">Ir a migobierno.com</a>
            </p>
        </div>
    </div>

    <!-- Footer -->
    <footer id="fPiePagina" class="w3-section">
        <div class="w3-row-padding w3-theme-grey-d5 w3-padding-8">
            <div class="w3-threequarter">
                &nbsp;
            </div>
            <div class="w3-quarter w3-right-align">
                <span class="w3-small w3-text-light-grey">SÍGUENOS</span>&nbsp;&nbsp;&nbsp;
                <a href="https://www.facebook.com/migobierno/" target="_blank">
                    <div class="imgFB w3-show-inline-block"></div></a>
            </div>
        </div>
        <div class="w3-row-padding w3-theme-grey-d4 w3-padding-16">
            <div class="w3-quarter w3-margin-top">
                <a href="index.html"><img src="../imagenes/LogotipoPieMiGobiernocom.png" style="width:100%"></a>
            </div>
    </footer>

</div>
<!-- End page content -->

</body>
</html>

<!-- GoogleAnalytics -->
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-85660693-1', 'auto');
    ga('send', 'pageview');

</script>

