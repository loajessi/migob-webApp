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
    <div class="w3-container" style="padding: 0 35px 0 35px">
        <!-- Contáctanos -->
        <p class="tituloSeccion">CONTÁCTANOS</p>
        <hr class="w3-theme-blue" style="height: 1px">
        <div class="w3-row">
            <div class="w3-quarter">
                &nbsp;
            </div>
            <div class="w3-half">
                <form id="frmContactanos" name="frmContactanos" method="post" action="#">
                    <div>
                        <label for="txtNombre" class="fontContactanos">Nombre: </label><br>
                        <input id="txtNombre" name="txtNombre" type="text" style="width: 100%"><br><br>
                        <label for="txtTelefono" class="fontContactanos">Teléfono: </label><br>
                        <input id="txtTelefono" name="txtTelefono" type="text" style="width: 100%"><br><br>
                        <label for="txtDireccion" class="fontContactanos">Dirección: </label><br>
                        <input id="txtDireccion" name="txtDireccion" type="text" style="width: 100%"><br><br>
                        <label for="txtEmail" class="fontContactanos">Email: </label><br>
                        <input id="txtEmail" name="txtEmail" type="text" style="width: 100%"><br><br>
                        <label for="txtaMensaje" class="fontContactanos">Mensaje: </label><br>
                        <textarea id="txtaMensaje" name="txtaMensaje" cols="72" rows="5" style="width: 100%"></textarea><br><br>
                    </div>
                    <div class="w3-center">
                        <input type="submit" id="bContactoEnviar" value='ENVIAR MENSAJE' class="w3-btn w3-round w3-theme-blue w3-hover-theme-red w3-textBtn-theme-blue"/>
                    </div>
                </form>
            </div>
            <div class="w3-quarter">
                &nbsp;
            </div>
        </div>
        <hr class="w3-theme-blue" style="height: 1px">
    </div>
    <input type="hidden" id="hdnAliasPaginaActual" name="hdnAliasPaginaActual" value="CONT"/>
</div>

<!-- Footer -->
<?php
include("../plantillas/migob-footer.php");
?>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();
        cargarControlador("cGenerales");
        cargarControlador("cFormularioContacto");
        barraLateralCargar();
        validarFormularioContacto();
    });
</script>

</body>
</html>