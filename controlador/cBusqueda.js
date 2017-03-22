function buscarEnSitio(pKeywords) {

    $("#lblKeywords").html('"<em>' + pKeywords + '</em>"');

    $.ajax({
        url: '/modelo/mBusqueda.php',
        async: false,
        type: 'POST',
        data: {'keywords': pKeywords},
        success: (function (response) {
            if(response == ""){
                $("#ulUrlsResultados").append($('<li>').html(
                    "<span class='urlDescripcion'>No se encontraron resultados que coincidan con su búsqueda.</span>"
                ));
                return;
            }

            var jsonResponse = JSON.parse(response);

            if (jsonResponse.Estado == 'OK') {
                var registros = jsonResponse.Datos;
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
            }
            else {
                swal("Error en la búsqueda", jsonResponse.mensaje, "warning");
            }
        }),
        error: (function (xhr, status, error) {
            swal("Error al cargar la búsqueda", error, "error");
        })
    });
}
