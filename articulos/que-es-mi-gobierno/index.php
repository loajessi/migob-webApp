<!DOCTYPE html>
<html>

<!-- Header -->
<?php
include("../../plantillas/migob-header.php");
?>

<body>
<!-- Content -->
<div id="dContenido">
    <div class="w3-hide-large w3-hide-medium" style="height:90px">&nbsp;</div> <!--small-->
    <div class="w3-hide-large w3-hide-small" style="height:235px">&nbsp;</div> <!--medium-->
    <div class="w3-hide-small w3-hide-medium" style="height:200px">&nbsp;</div> <!--large-->

    <!--  Sección 1 -->
    <div class="w3-row-padding">
        <div id="sec_contenidoArticulo" class="w3-twothird w3-container">
            <!-- Botones de compartir -->
            <div style="display: table">
                <div style="display: table-column"></div>
                <div style="display: table-column"></div>
                <div style="display: table-column"></div>
                <div style="display: table-row">
                    <!--<div
                        class="fb-like"
                        data-share="true"
                        data-width="450"
                        data-show-faces="true">
                        <a href="index.php">Compartir</a>
                    </div>-->
                    <div style="display: table-cell; vertical-align: middle">
                        <div id="shareBtn" style="background-color: #2d609b; padding: 10px; color: #FFF">
                            <a><i class="fa fa-facebook-official fa-lg"></i></a>
                        </div>
                    </div>
                    <div style="display: table-cell">&nbsp;&nbsp;</div>
                    <div style="display: table-cell; vertical-align: bottom">
                        <!-- Twitter -->
                        <a href="https://twitter.com/share" class="twitter-share-button"
                           data-url="http://jessica-dev.migobierno.com/articulos/que-es-mi-gobierno/"
                           data-text="migobierno.com"
                           data-via="migobiernocom" data-lang="es" data-related="migobiernocom"
                           data-hashtags="que-es-mi-gobierno">Twittear</a>
                    </div>
                </div>
            </div>

            <!-- Contenido del artículo -->
            <p>Video...</p>
        </div>
        <div class="w3-third w3-container">
            <div id="sec_EspacioPublicitario_1" class="w3-content">
                <a><img src="" style="width: 100%"></a>
            </div>
            <div id="sec_EspacioPublicitario_2" class="w3-content w3-margin-top">
                <a><img src="" style="width: 100%"></a>
            </div>
        </div>
    </div>

    <!-- Espacio publicitario 3 -->
    <div id="sec_EspacioPublicitario_3" class="w3-section">
        <a><img src="" style="width: 100%"></a>
    </div>

    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="ART"/>
</div>

<!-- Footer -->
<?php
include("../../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        // Barra de menú lateral (móvil)
        barraLateralCargar();

        // Controladores generales
        obtenerVersionControladores();
        cargarControlador("cGenerales");

        // Cargar Anuncios
        var jsonParametros = ciudadParametrosObtener();
//        anunciosPaginaCargar(jsonParametros);
    });
</script>

<script>
    window.fbAsyncInit = function () {
        FB.init({
            appId: '257125251383358',
            xfbml: true,
            version: 'v2.8'
        });
        FB.AppEvents.logPageView();
    };

    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>


<script>
    document.getElementById('shareBtn').onclick = function() {
        FB.ui({
            display: 'popup',
            method: 'share',
            href: 'http://www.migobierno.com/articulos/2017/01/10-parques-nacionales-mas-visitados-en-eua/'
        }, function(response){});
    }
</script>

</body>
</html>
