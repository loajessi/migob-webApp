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

    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="INI"/>
</div>

<!-- Footer -->
<?php
include("../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();

        cargarControlador("cGenerales");
//        cargarControlador("[cControlador]");   Del contenido en específico

        barraLateralCargar();
//        [pagina]CargarSecciones();
    });
</script>

</body>
</html>