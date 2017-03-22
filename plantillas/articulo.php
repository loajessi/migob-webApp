<!DOCTYPE html>
<html>

<!-- Encabezado -->
<?php
include("../../plantillas/migob-header.php");
?>

<body>
<!-- Espacio para que no se traslape el contenido con el encabezado -->
<div class="w3-hide-large w3-hide-medium" style="height:90px">&nbsp;</div> <!-- small (movil)-->
<div class="w3-hide-large w3-hide-small" style="height:235px">&nbsp;</div> <!-- medium (tablet) -->
<div class="w3-hide-small w3-hide-medium" style="height:200px">&nbsp;</div> <!-- large (computadora) -->

<div id="dContenido">

    <!-- Contenido a la izquierda y anuncios a la derecha -->
    <div class="w3-row-padding">

        <!-- Botones de compartir -->
        <div style="display: table">
            <div style="display: table-column"></div>
            <div style="display: table-column"></div>
            <div style="display: table-column"></div>
            <div style="display: table-row">
                <div style="display: table-cell; vertical-align: middle">
                    <!-- Facebook -->
                    <div class="fb-share-button" style="height: 27px"
                         data-href="http://jessica-dev.migobierno.com/articulos/que-es-mi-gobierno/"
                         data-layout="button"
                         data-size="large">
                        <a class="fb-xfbml-parse-ignore" target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse">
                            Compartir</a>
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
        <div id="sec_contenidoArticulo" class="w3-twothird w3-container">
            <p>Aquí va el contenido del artículo :) </p>
        </div>

        <!-- Anuncios -->
        <div class="w3-third w3-container">
            <div id="sec_EspacioPublicitario_1" class="w3-content">
                <a><img src="" style="width: 100%"></a>
            </div>
            <div id="sec_EspacioPublicitario_2" class="w3-content w3-margin-top">
                <a><img src="" style="width: 100%"></a>
            </div>
        </div>
    </div>

    <!-- Espacio publicitario 3 (ancho completo de la pantalla) -->
    <div id="sec_EspacioPublicitario_3" class="w3-section">
        <a><img src="" style="width: 100%"></a>
    </div>

    <!-- Alias de la página para cargar secciones y/o anuncios -->
    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="ART"/>
</div>

<!-- Pie de página -->
<?php
include("../../plantillas/migob-footer.php");
?>

<!-- Script para cargar contenido (si es dinámico) y/o anuncios -->
<script type="text/javascript">
    $(document).ready(function () {
        // Barra de menú lateral (móvil)
        barraLateralCargar();

        // Controladores generales
        obtenerVersionControladores();
        cargarControlador("cGenerales");

        // Cargar Anuncios
        var jsonParametros = ciudadParametrosObtener();
        anunciosPaginaCargar(jsonParametros);
    });
</script>

</body>
</html>