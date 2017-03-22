var MAX_ENESTEMES = 2;

function enEsteMesCargarSecciones(){
    var jsonParametros = ciudadParametrosObtener();

    // Secciones Ancla y Anuncios
    seccionesPaginaCargar(jsonParametros);
    anunciosPaginaCargar(jsonParametros);

    // Contenido
    enEsteMesCargar(jsonParametros);
}

function enEsteMesCargar(pJsonParametros){
    var iPagina_ID = 0;

    if (pJsonParametros.pAliasPagina == 'INI') iPagina_ID = 1;
    else iPagina_ID = 2;

    $.ajax({
        url: '/modelo/mEnEsteMesObtener.php',
        async: false,
        type: 'POST',
        data: {
            'pPagina_ID': iPagina_ID,
            'pCiudad_ID': pJsonParametros.pCiudad_ID,
            'pPais_ID': pJsonParametros.pPais_ID
        },
        success: (function (response) {
            if (response == '') {
                $("#spnTituloEventos").html("Eventos del mes");
                $("#ulEnEsteMes").append($('<li>').html("<span class='urlDescripcion'>Proximamente ...</span>"));
                return;
            }

            var jsonResponse = JSON.parse(response);

            if (jsonResponse.Estado == 'OK') {
                var jsonEnEsteMes = jsonResponse.Datos,
                    limiteMostrar = MAX_ENESTEMES;

                if(pJsonParametros.pAliasPagina == 'INI'){
                    if (jsonEnEsteMes.length < MAX_ENESTEMES)
                        limiteMostrar = jsonEnEsteMes.length;

                    for (var i = 0; i < limiteMostrar; i++) {
                        var fecha = jsonEnEsteMes[i].Fecha,
                            diaMes = fecha.substr(8, 2),
                            mesNombre = mesNombreObtener(fecha.substr(5, 2)),

                            fechaLi = "<div class='w3-border-right w3-col' align='center' style='width: 70px'>" +
                                "<span class='dia'>" + diaMes + "</span><br><span class='mes'>" + mesNombre + "</span>" +
                                "</div>",

                            textoLi = "<div class='w3-rest w3-padding'>" +
                                "<span>" + jsonEnEsteMes[i].Titulo + "</span><br>" +
                                "</div>";

                        $("#ulEnEsteMes").append($('<li class="w3-margin-top w3-padding-8 w3-border-0">').html(fechaLi + textoLi));
                    }
                }
                else{
                    jsonEnEsteMes.forEach(function (jsonEnEsteMesEvento) {
                        var fecha = jsonEnEsteMesEvento.Fecha,
                            diaMes = fecha.substr(8, 2),
                            mesNombre = mesNombreObtener(fecha.substr(5, 2));

                        var fechaLi = "<i class='fa fa-calendar-o'></i>&nbsp;<span>" + diaMes + " de " + mesNombre + "</span>",
                            tituloLi = "<div class='urlSeccion'>" + fechaLi + "&nbsp;&nbsp;&nbsp;&nbsp;" +
                                "<span>" + jsonEnEsteMesEvento.Titulo + "</span><br>" +
                                "</div>",
                            descripcionLi = "<span class='urlDescripcion'><div align='justify'>" + jsonEnEsteMesEvento.Descripcion + "</div></span>";

                        $("#spnTituloEventos").html("Eventos del mes de " + mesNombre);
                        $("#ulEnEsteMes").append($('<li>').html(tituloLi + descripcionLi));
                    });
                }
            }
            else {
                swal("Error al cargar los eventos del mes", jsonResponse.mensaje, "warning");
            }
        }),
        error: (function (xhr, status, error) {
            swal("Error al cargar eventos del mes", error, "error");
        })
    });
}