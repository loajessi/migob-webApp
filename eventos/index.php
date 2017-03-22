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
    <!--  Sección 1 -->
    <div class="w3-row-padding">
        <div id="sec_ListaUrlsCategoria" class="w3-twothird w3-container">
            <!-- Lista de Eventos -->
            <div id="spnTituloEventos" class="tituloSeccion w3-margin-left">Próximos eventos</div>
            <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
            <ul id="ulEventos" class="vinietaDocs"></ul>
            <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
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

    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="EV_PROX"/>
</div>

<!-- Footer -->
<?php
include("../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();

        cargarControlador("cGenerales");
        cargarControlador("cEventos");

        barraLateralCargar();
        eventosCargarSecciones();
    });
</script>

</body>
</html>
