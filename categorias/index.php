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
            <!-- Lista de URL's -->
            <div id="spnTituloCategoria" class="tituloSeccion w3-margin-left"></div>
            <div id="spnTituloSubCategoria" class="subtituloSeccion w3-margin-left"></div>
            <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
            <ul id="ulUrlsCategoria" class="vinietaDocs"></ul>
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

    <!-- Sección 2 -->
    <!--<div class="w3-row-padding">
        <div class="w3-third">
            &lt;!&ndash;Imagen ancla 1&ndash;&gt;
            <div id="sec_InfoDestacada_1" class="w3-content w3-display-container w3-margin-top">
                <img src="imagenes/greenCard.png" style="width: 100%; height: 233px;">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick="">¿Cómo puedo tramitar mi tarjeta verde?
                        Conoce el trámite para tramitar tu
                        residencia permanente</a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>

        <div class="w3-third">
            &lt;!&ndash; Imagen ancla 2 &ndash;&gt;
            <div id="sec_InfoDestacada_2" class="w3-content w3-display-container w3-margin-top">
                <img src="imagenes/multas.png" style="width: 100%; height: 233px;">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick="">Cómo pagar multas de tránsito</a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>


        </div>

        <div class="w3-third">
            &lt;!&ndash; Imagen ancla 3 &ndash;&gt;
            <div id="sec_InfoDestacada_3" class="w3-content w3-display-container w3-margin-top">
                <img src="imagenes/impuestos.png" style="width: 100%; height: 233px;">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick="">Cómo preparar y presentar su declaración
                        de impuestos</a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>
    </div>-->

    <!-- Espacio publicitario 3 -->
    <!--<div id="sec_EspacioPublicitario_3" class="w3-section">
        <img src="imagenes/espacioPublicitario.png" style="width: 100%">
    </div>-->
    <input type="hidden" id="hdnCategoria" name="hdnCategoria" value="<?=$_POST['hdnCategoria']?>">
    <input type="hidden" id="hdnCategoriaID" name="hdnCategoriaID" value="<?=$_POST['hdnCategoriaID']?>">
    <input type="hidden" id="hdnSubcategoria" name="hdnSubcategoria" value="<?=$_POST['hdnSubcategoria']?>">
    <input type="hidden" id="hdnSubcategoriaID" name="hdnSubcategoriaID" value="<?=$_POST['hdnSubcategoriaID']?>">
    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual"
           value="<?= $_POST['hdnAliasCategoria']; ?>"/>
</div>

<!-- Footer -->
<?php
include("../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();
        cargarControlador("cGenerales");
        cargarControlador("cCategoriasUrls");
        barraLateralCargar();
        categoriasCargarSecciones();
    });
</script>

</body>
</html>