<!DOCTYPE html>
<html>

<!-- Header -->
<?php
include("../plantillas/migob-header.php");
?>

<body>

<!-- Content -->
<div class="w3-hide-large w3-hide-medium" style="height:90px">&nbsp;</div> <!--small-->
<div class="w3-hide-large w3-hide-small" style="height:235px">&nbsp;</div> <!--medium-->
<div class="w3-hide-small w3-hide-medium" style="height:200px">&nbsp;</div> <!--large-->
<div id="dContenido">
    <div class="w3-container">
        <!-- Lista de URL's resultado de la búsqueda -->
        <div class="tituloSeccion w3-margin-left">Resultados de su búsqueda con las palabras <label
                id="lblKeywords"></label></div>
        <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
        <ul id="ulUrlsResultados" class="vinietaDocs"></ul>
        <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
    </div>

    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="BUSCAR"/>
</div>

<!-- Footer -->
<?php
include("../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();
        cargarControlador("cBusqueda");
        barraLateralCargar();
        buscarEnSitio('<?= $_POST['txtBuscarEnSitio']; ?>');
    });
</script>

</body>
</html>