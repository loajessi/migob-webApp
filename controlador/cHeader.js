function contenidoIndexIrA(pAncla, pAliasPaginaAncla) {
    if ($("#hdnAliasPaginaActual").val() != pAliasPaginaAncla) {
        if (pAliasPaginaAncla == 'INI')
            contenidoIndexCargar({vista: 'vInicio', alias: 'INI', ancla: pAncla});
    }
    else {
        event.preventDefault();
        var ir = pAncla;
        var new_position = jQuery('#' + ir).offset();
        window.scrollTo(new_position.left, new_position.top);
        return false;
    }
}

function buscarEnSitio() {
    var sKeywords = $("#txtBuscarEnSitio").val();

    $("#lblKeywords").html('"<em>' + sKeywords + '</em>"');

    $.ajax({
        url: 'modelo/mBusqueda.php',
        async: false,
        type: 'POST',
        data: {'keywords': sKeywords},
        success: (function (response) {
            if ($.trim(response) == '') {
                $("#ulUrlsResultados").append($('<li>').html(
                    "<span class='urlDescripcion'>No se encontraron resultados que coincidan con su búsqueda.</span>"
                ));
                return;
            }
            var registros = JSON.parse(response);
            registros.forEach(function (resultado) {
                var localizacion = resultado.geography,
                    separador = '',
                    titulo = ' ' + resultado.title;

                if (localizacion.indexOf('>') < localizacion.length - 1) separador = ' >';

                var textoLi = "<a href=" + resultado.url + " target='_blank' class='urlSeccion w3-hover-text-theme-red'>" +
                        localizacion + separador + titulo + "</a><br/>",
                    descripcionLi = "<span class='urlDescripcion'>" + resultado.description + "</span>";

                $("#ulUrlsResultados").append($('<li>').html(textoLi + descripcionLi));
            })
        }),
        error: (function (xhr, status, error) {
            console.log("Error al cargar resultados de búsqueda:" + error);
        })
    });
}
