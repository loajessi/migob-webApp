<!DOCTYPE html>
<html>

<!-- Header -->
<?php
include("plantillas/migob-header.php");
?>

<body>

<!-- Content -->
<div class="w3-hide-large w3-hide-medium" style="height:90px">&nbsp;</div> <!--small-->
<div class="w3-hide-large w3-hide-small" style="height:235px">&nbsp;</div> <!--medium-->
<div class="w3-hide-small w3-hide-medium" style="height:200px">&nbsp;</div> <!--large-->
<div id="dContenido">
    <!--  Sección 1 -->
    <div class="w3-row-padding">
        <div class="w3-twothird w3-container">
            <!--Imagen ancla principal-->
            <div id="sec_ImgPrincipal" class="w3-content w3-display-container">
                <div class="camera_wrap camera_azure_skin" id="camera_sec_ImgPrincipal"></div>
            </div>

            <!--Menú de categorías-->
            <div id="sec_CategoriasListado" class="w3-row-padding w3-margin-top w3-hide-small">
                <div class="w3-half w3-container">
                    <ul id="ulClasificacion1" class="w3-ul">
                        <li id="liTituloSeccion1" class="tituloSeccion"></li>
                    </ul>
                </div>
                <div class="w3-half w3-container">
                    <ul id="ulClasificacion2" class="w3-ul">
                        <li id="liTituloSeccion2" class="tituloSeccion"></li>
                    </ul>
                    <ul id="ulClasificacion3" class="w3-ul">
                        <li id="liTituloSeccion3" class="tituloSeccion"></li>
                    </ul>
                </div>
                <form id="frmCategorias" method="post" action="categorias/">
                    <input type="hidden" id="hdnCategoria" name="hdnCategoria" value="">
                    <input type="hidden" id="hdnCategoriaID" name="hdnCategoriaID" value="0">
                    <input type="hidden" id="hdnSubcategoria" name="hdnSubcategoria" value="">
                    <input type="hidden" id="hdnSubcategoriaID" name="hdnSubcategoriaID" value="0">
                    <input type="hidden" id="hdnAliasCategoria" name="hdnAliasCategoria" value="">
                </form>
            </div>

            <div id="sec_CategoriasListadoAcc"
                 class="w3-accordion w3-margin-top w3-margin-bottom w3-hide-large w3-hide-medium">
                <button onclick="abrirCategoria('divSeccionAcc1')"
                        class="tituloSeccion w3-btn-block w3-left-align w3-theme-blue w3-border-bottom w3-padding-16 w3-hover-theme-red">
                    <label id="lblTituloSeccion1"></label>&nbsp;<i class="fa fa-caret-down"></i>
                </button>
                <div id="divSeccionAcc1" class="w3-accordion-content">
                    <ul id="ulClasificacionAcc1" class="w3-ul"></ul>
                </div>
                <button onclick="abrirCategoria('divSeccionAcc2')"
                        class="tituloSeccion w3-btn-block w3-left-align w3-theme-blue w3-border-bottom w3-padding-16 w3-hover-theme-red">
                    <label id="lblTituloSeccion2"></label>&nbsp;<i class="fa fa-caret-down"></i>
                </button>
                <div id="divSeccionAcc2" class="w3-accordion-content">
                    <ul id="ulClasificacionAcc2" class="w3-ul"></ul>
                </div>
                <button onclick="abrirCategoria('divSeccionAcc3')"
                        class="tituloSeccion w3-btn-block w3-left-align w3-theme-blue w3-padding-16 w3-hover-theme-red">
                    <label id="lblTituloSeccion3"></label>&nbsp;<i class="fa fa-caret-down"></i>
                </button>
                <div id="divSeccionAcc3" class="w3-accordion-content">
                    <ul id="ulClasificacionAcc3" class="w3-ul"></ul>
                </div>
            </div>

        </div>

        <div class="w3-third w3-container">
            <!-- Loteria -->
            <div id="sec_Loteria" class="w3-card" style="height: 100%"><!--169-->
                <div class="w3-container w3-center w3-padding-8">
                    <p><b><label id="lblFechaLoteria"></label> | Números ganadores</b></p>
                    <span class="w3-badge w3-xlarge w3-padding-small w3-light-grey w3-show-inline-block w3-hide-medium"> 88 </span>
                    <span class="w3-badge w3-xlarge w3-padding-small w3-light-grey w3-show-inline-block w3-hide-medium">22</span>
                    <span class="w3-badge w3-xlarge w3-padding-small w3-light-grey w3-show-inline-block">51</span>
                    <span class="w3-badge w3-xlarge w3-padding-small w3-light-grey w3-show-inline-block">19</span>
                    <span class="w3-badge w3-xlarge w3-padding-small w3-light-grey w3-show-inline-block">93</span>
                    <span class="w3-badge w3-xlarge w3-padding-small w3-theme-red w3-show-inline-block">89</span>
                </div>
                <div class="w3-container w3-center w3-theme-grey w3-padding-16">
                    <a href="#" target="_blank" class="w3-text-white w3-hover-text-theme-blue tituloUrl"
                       style="font-size: 16px">...</a>
                </div>
            </div>

            <!-- En este mes -->
            <div id="sec_EnEsteMes" class="w3-card w3-margin-top cardNoticiasEventos">
                <a name="anclaEnEsteMes" id="anclaEnEsteMes"/>
                <span class="encabezadoSeccion">EN ESTE MES</span>

                <div style="height: 200px; width: 100%; overflow: auto">
                    <ul id="ulEnEsteMes" class="w3-ul w3-text-white w3-padding-8"></ul>
                </div>

                <div class="w3-center">
                    <a class="w3-btn w3-round w3-theme-blue w3-hover-theme-red w3-textBtn-theme-blue"
                       href="/en-este-mes/">VER TODOS LOS
                        EVENTOS
                    </a>
                </div>
            </div>

            <!-- Eventos -->
            <div id="sec_EventosMes" class="w3-card w3-margin-top cardNoticiasEventos">
                <a name="anclaEventos" id="anclaEventos"/>
                <span class="encabezadoSeccion">PRÓXIMOS EVENTOS</span>

                <div style="height: 200px; width: 100%; overflow: auto">
                    <ul id="ulEventos" class="w3-ul w3-text-white w3-padding-8"></ul>
                </div>
                <div class="w3-center">
                    <a class="w3-btn w3-round w3-theme-blue w3-hover-theme-red w3-textBtn-theme-blue"
                       href="/eventos/">VER TODOS LOS
                        EVENTOS
                    </a>
                </div>
            </div>

            <!-- Noticias -->
            <div id="sec_Noticias" class="w3-card w3-margin-top" style="height: 350px; overflow: auto"></div>
        </div>
    </div>

    <!-- Espacio publicitario 1 -->
    <div id="sec_EspacioPublicitario_1" class="w3-section">
        <!--<div class="w3-container w3-hide-small w3-center"><img src="" style="height: 140px;"></div>
        <div class="w3-container w3-hide-large w3-hide-medium"><img src="" style="width: 100%; height: 140px;"></div>-->
    </div>

    <!-- Sección 2 -->
    <div class="w3-row-padding">
        <!-- Imagen ancla 2 -->
        <div id="sec_InfoDestacada_2" class="w3-third">
            <div class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>

                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>

        <!-- Imagen ancla 3 -->
        <div id="sec_InfoDestacada_3" class="w3-third">
            <div class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>

        <!-- Imagen ancla 4 -->
        <div id="sec_InfoDestacada_4" class="w3-third">
            <div class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Sección 3 -->
    <div class="w3-row-padding w3-margin-top">
        <a name="anclaComoPuedo" id="anclaComoPuedo"/>

        <div id="sec_ComoPuedo" class="w3-twothird w3-container w3-margin-bottom">
            <!-- Cómo puedo -->
            <span id="spnTituloCategoria" class="tituloSeccion w3-margin-left">¿CÓMO PUEDO?</span>
            <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
            <ul id="ulComoPuedo" class="w3-ul"></ul>
        </div>
        <div class="w3-third w3-container w3-margin-bottom">
            <!-- Imagen ancla 5 -->
            <div id="sec_InfoDestacada_5" class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>

            <!-- Imagen ancla 6 -->
            <div id="sec_InfoDestacada_6" class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>
        <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="INI"/>
    </div>

    <!-- Espacio publicitario 2 -->
    <div id="sec_EspacioPublicitario_2" class="w3-section">
        <!--    <div class="w3-container w3-hide-small w3-center"><img src="" style="height: 140px;"></div>
            <div class="w3-container w3-hide-large w3-hide-medium"><img src="" style="width: 100%; height: 140px;"></div>
        --></div>

    <!-- Sección 4 -->
    <div class="w3-row-padding">
        <!-- Imagen ancla 2 -->
        <div id="sec_InfoDestacada_7" class="w3-third">
            <div class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>

        <!-- Imagen ancla 3 -->
        <div id="sec_InfoDestacada_8" class="w3-third">
            <div class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>

        <!-- Imagen ancla 4 -->
        <div id="sec_InfoDestacada_9" class="w3-third">
            <div class="w3-content w3-display-container w3-margin-top">
                <iframe
                    src="" allowtransparency="true" allowfullscreen="true" scrolling="no" frameborder="0"
                    class="imgAncla" style="display:none;border:none;overflow:hidden">
                </iframe>
                <img src="" class="imgAncla">

                <div class="w3-padding w3-display-bottomleft notaImgAnclaText">
                    <a class="w3-hover-text-theme-blue tituloUrl" onclick=""></a><br/>
                    <a class="w3-hover-text-theme-blue descripcionUrl" onclick=""></a>
                </div>
            </div>
        </div>
    </div>

    <div id="sec_ContenidoDinamico" class="w3-container w3-margin-bottom">
        <!-- Contenido dinamico -->
        <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
        <!--<ul id="ulLoUltimo" class="w3-ul"></ul>-->
        <div id="contenidoDinamico"></div>
    </div>
</div>

<!-- Noticias -->
<div id="sec_NoticiasLoad" style="display: none;">
    <script type="text/javascript"
            src="http://www.feedsweep.com/Products/FeedSweep/Producer.aspx?feeds=http%3a%2f%2fcnnespanol.cnn.com%2ffeed%2f&amp;title=NOTICIAS&amp;maxoutput=5&amp;headlinelimit=3000&amp;datesort=descending&amp;displaydescriptions=false&amp;displaydates=false&amp;cat=6&amp;lang=es-ES&amp;implementation=divs&amp;feedsweepclassname=cardNoticiasEventos&amp;linkclassname=w3-hover-text-theme-blue&amp;titleclassname=encabezadoSeccion&amp;itemclassname=w3-text-white w3-padding-16&amp;includexmlbutton=false&amp;backgroundcolor=%23003366&amp;linecolor=%23003366&amp;headercolor=%23FFFFFF&amp;titlecolor=%23FF6600&amp;textcolor=%23FFFFFF&amp;datecolor=%2399CCFF&amp;key=MO3y6jcnZ0ia8VBlKwXGig&amp;ver=5.0.1.0"></script>
</div>

<!-- Footer -->
<?php
include("plantillas/migob-footer.php");
?>

<!-- Scripts -->
<script type='text/javascript' src='_componentes/camera/scripts/jquery.mobile.customized.min.js'></script>
<script type='text/javascript' src='_componentes/camera/scripts/jquery.easing.1.3.js'></script>
<script type='text/javascript' src='_componentes/camera/scripts/camera.min.js'></script>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();

        cargarControlador("cGenerales");
        cargarControlador("cEnEsteMes");
        cargarControlador("cEventos");
        cargarControlador("cUltimo");
        cargarControlador("cIndex");

        barraLateralCargar();
        indexCargarSecciones();
    });
</script>

</body>
<head>
    <meta http-equiv="pragma" content="no-cache">
</head>
</html>

