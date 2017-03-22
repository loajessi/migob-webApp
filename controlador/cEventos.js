var MAX_EVENTOS = 2;

function eventosCargarSecciones() {
    var jsonParametros = ciudadParametrosObtener();

    // Secciones Ancla y Anuncios
    seccionesPaginaCargar(jsonParametros);
    anunciosPaginaCargar(jsonParametros);

    // Contenido
    eventosCargar(jsonParametros);
}

function eventosCargar(pJsonParametros) {
    $.ajax({
        url: '/modelo/mEventosObtener.php',
        async: false,
        type: 'POST',
        data: {
            'pCiudad_ID': pJsonParametros.pCiudad_ID,
            'pPais_ID': pJsonParametros.pPais_ID
        },
        success: (function (response) {
            if (response == '') {
                $("#ulEventos").append($('<li>').html("<span class='urlDescripcion'>Próximamente ...</span>"));
                return;
            }

            var jsonResponse = JSON.parse(response);

            if (jsonResponse.Estado == 'OK') {
                var jsonEventos = jsonResponse.Datos,
                    limiteMostrar = MAX_EVENTOS;

                if (pJsonParametros.pAliasPagina == 'INI') {
                    if (jsonEventos.length < MAX_EVENTOS)
                        limiteMostrar = jsonEventos.length;

                    for (var i = 0; i < limiteMostrar; i++) {
                        var fecha = jsonEventos[i].Fecha,
                            diaMes = fecha.substr(8, 2),
                            mesNombre = mesNombreObtener(fecha.substr(5, 2)),

                            fechaLi = "<div class='w3-border-right w3-col' align='center' style='width: 70px'>" +
                                "<span class='dia'>" + diaMes + "</span><br><span class='mes'>" + mesNombre + "</span>" +
                                "</div>",

                            textoLi = "<div class='w3-rest w3-padding'>" +
                                "<span>" + jsonEventos[i].Titulo + "</span><br>" +
                                "</div>";

                        $("#ulEventos").append($('<li class="w3-margin-top w3-padding-16 w3-border-0">').html(fechaLi + textoLi));
                    }
                }
                else {
                    jsonEventos.forEach(function (jsonEvento) {
                        var fecha = jsonEvento.Fecha,
                            diaMes = fecha.substr(8, 2),
                            mesNombre = mesNombreObtener(fecha.substr(5, 2));

                        var fechaLi = "<i class='fa fa-calendar-o'></i>&nbsp;<span>" + diaMes + " de " + mesNombre + "</span>",
                            tituloLi = "<div class='urlSeccion'>" + fechaLi + "&nbsp;&nbsp;&nbsp;&nbsp;" +
                                "<span>" + jsonEvento.Titulo + "</span><br>" +
                                "</div>",
                            descripcionLi = "<span class='urlDescripcion'><div align='justify'>" + jsonEvento.Descripcion + "</div></span>";

                        $("#ulEventos").append($('<li>').html(tituloLi + descripcionLi));
                    });
                }
            }
            else {
                swal("Error al cargar los eventos", jsonResponse.mensaje, "warning");
            }
        }),
        error: (function (xhr, status, error) {
            swal("Error al cargar los eventos", error, "error");
        })
    });
}