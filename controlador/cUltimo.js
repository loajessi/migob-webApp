function ultimoActualizar() {
    $.ajax({
        url: '/modelo/mUltimo.php',
        async: false,
        type: 'POST',
        data: {},
        success: (function (response) {
            if ($.trim(response) == '') {
                $("#sec_ContenidoDinamico").hide();
                return;
            }

            $("#sec_ContenidoDinamico").show();
            var jsonResponse = JSON.parse(response);
            if (jsonResponse.Estado == 'OK') {
                var registros = jsonResponse.Datos,
                    columna = 0,
                    bFilaNueva = true,
                    contenido = "";
                registros.forEach(function (ultimo) {
                    var titulo = ultimo.Titulo,
                        descripcion = ultimo.Descripcion,
                        url = ultimo.URL,
                        img = ultimo.Imagen;


                    if (bFilaNueva) {
                        if (contenido != '') contenido += "</div>";
                        contenido += '<div class="w3-row-padding">';
                    }

                    contenido += '<div class="w3-quarter">' +
                        '<div class="w3-content w3-display-container w3-margin-top"> ' +
                        '<img src="' + img + '" class="imgUltimo">' +
                        '<div class="w3-padding w3-display-bottomleft notaImgUltimo">' +
                        '<a class="w3-hover-text-theme-blue urlDinamicoTitulo" href="' + url + '" target="_blank">' + titulo + '</a>' +
                        '</div>' +
                        '</div>' +
                        '</div>';

                    columna++;
                    if (columna % 4 == 0) bFilaNueva = true;
                    else bFilaNueva = false;
                });

                $("#contenidoDinamico").html(contenido);
            }
            else
                swal("Error", jsonResponse.mensaje, "warning");
        }),
        error: (function (xhr, status, error) {
            swal("Error", error, "error");
        })
    });
}
