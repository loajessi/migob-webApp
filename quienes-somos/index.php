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
    <!--  Sección Quienes Somos -->
    <div class="w3-row-padding w3-main">
        <div id="sec_QuienesSomos" class="w3-twothird w3-container">
            <span class="tituloSeccion w3-margin-left">MI GOBIERNO.COM</span>
            <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
            <div align="justify" style="padding: 20px">
                <span class="tituloSecundaria">¿Quiénes sómos?</span><br>
            <span>
                Mi Gobierno.com es un portal electrónico en español que presenta, de forma organizada,
                la información de los servicios públicos del gobierno de los Estados Unidos.
            </span>
            </div>
            <div align="justify" style="padding: 20px">
                <span class="tituloSecundaria">Nuestra misión</span><br>
            <span>
                Convertirse en el portal electrónico principal que provea información de los servicios del gobierno para la población hispanohablante en los Estados Unidos.
            </span>
            </div>
            <div align="justify" style="padding: 20px">
                <span class="tituloSecundaria">Nuestra visión</span><br>
            <span>
                Al proveer información directamente al público hispanohablante en los Estados Unidos, esperamos:
                <ol>
                    <li>Educar a la comunidad de habla hispana en los Estados Unidos sobre sus derechos,
                        responsabilidades, servicios y recursos a los que
                        tienen derecho.
                    </li>
                    <li>Que el pueblo hispano conozca que puede, con toda seguridad, involucrarse con su gobierno, y que
                        el gobierno está para servir a la gente.
                    </li>
                    <li>Que la gente sepa que tiene derecho a un gobierno que los proteja y que les asegure la búsqueda
                        de felicidad y protección de su bienestar y libertad a vivir.
                    </li>
                </ol>
            </span>
            </div>
            <hr class="w3-margin-left w3-theme-blue" style="height: 1px">
        </div>
        <div class="w3-third w3-container">
            <div class="w3-content"><img src="/imagenes/persons-family-parents-kid-child-731514.jpg"
                                         style="height:520px; width: 100%"></div>
        </div>
    </div>
</div>

<!-- Footer -->
<?php
include("../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();
        cargarControlador("cGenerales");
        barraLateralCargar();
    });
</script>

</body>
</html>