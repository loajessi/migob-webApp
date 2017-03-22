function ciudadParametrosCargar(event, idCiudad, nombreCiudad, pais) {
    setCookie('ubicacionUsr_pais', pais, 1);
    setCookie('ubicacionUsr_ciudad', idCiudad, 1);
    setCookie('ubicacionUsr_ciudadNombre', nombreCiudad);

    contenidoPorUbicacionActualizar();
}

function ciudadParametrosObtener() {
    var paisID = getCookie('ubicacionUsr_pais');

    if (paisID == '') paisID = 'USA';

    var jsonParametrosCiudadPagina = {
        pAliasPagina: $("#hdnAliasPaginaActual").val()
        , pIdCategoria: ''
        , pIdSubCategoria: ''
        , pCiudad_ID: getCookie('ubicacionUsr_ciudad') //Ciudad_ID
        , pPais_ID: paisID //Pais_ID
    };

    $("#listaCiudades").val(getCookie('ubicacionUsr_ciudadNombre'));
    $("#listaCiudadesM").val(getCookie('ubicacionUsr_ciudadNombre'));

    return jsonParametrosCiudadPagina;
}

function contenidoPorUbicacionActualizar() {
    var aliasPagina = $("#hdnAliasPaginaActual").val(),
        jsonParametros = ciudadParametrosObtener();

    if (aliasPagina == 'INI') {
        $("#camera_sec_ImgPrincipal").html("");
        $("#ulEnEsteMes").empty();
        $("#ulEventos").empty();
        $("#ulComoPuedo").empty();

        // Secciones ancla
        seccionesPaginaCargar(jsonParametros);

        enEsteMesCargar(jsonParametros);
        eventosCargar(jsonParametros);
    }
    else if ((aliasPagina == 'CAT') || (aliasPagina == 'SUBCAT')) {
        $("#ulUrlsCategoria").empty();
        categoriasCargarSecciones(jsonParametros);
    }
    else if (aliasPagina == 'EV_MES') {
        $("#ulEnEsteMes").empty();
        enEsteMesCargarSecciones()
    }
    else if (aliasPagina == 'EV_PROX') {
        $("#ulEventos").empty();
        eventosCargarSecciones()
    }
}

function seccionesPaginaCargar(pParametrosSeccion) {
    $.ajax({
        url: "/modelo/mListaUrlsObtener.php",
        async: false,
        type: 'POST',
        data: {
            'pCiudad_ID': pParametrosSeccion.pCiudad_ID,
            'pPais_ID': pParametrosSeccion.pPais_ID,
            'pAliasPagina': pParametrosSeccion.pAliasPagina,
            'pIdCategoria': pParametrosSeccion.pIdCategoria
        },

        success: (function (response) {
            if (response == '') return;

            var jsonResponse = JSON.parse(response);
            if(jsonResponse.Estado == 'OK'){
                var carruselImg = "",
                    jsonUrls = jsonResponse.Datos;

                jsonUrls.forEach(function (jsonSeccion) {
                    if (jsonSeccion.Seccion == 'a_sec_ImgPrincipal') {
                        carruselImg +=
                            "<div data-src='" + jsonSeccion.Imagen + "'>" +
                            "<div class='camera_caption fadeFromBottom'>" +
                            "<a href='" + jsonSeccion.URL + "' class='w3-hover-text-theme-blue w3-xlarge tituloUrl' target=_blank>" + jsonSeccion.Titulo + "</a><br>" +
                            "<a href='" + jsonSeccion.URL + "' class='w3-hover-text-theme-blue descripcionUrl' target=_blank>" + jsonSeccion.Descripcion + "</a>" +
                            "</div>" +
                            "</div>";
                    }
                    else {
                        if (pParametrosSeccion.pAliasPagina == 'INI' && carruselImg != '') {
                            $("#camera_sec_ImgPrincipal").html(carruselImg);
                            jQuery('#camera_sec_ImgPrincipal').camera({
                                height: '409px',
                                loader: 'none',
                                pagination: true,
                                thumbnails: false,
                                fx: 'scrollLeft',
                                mobileFx: '',
                                slideOn: 'prev',
                                time: 3000
                            });
                            carruselImg = "";
                        }

                        if (pParametrosSeccion.pAliasPagina == 'INI' && jsonSeccion.Seccion == 'sec_ComoPuedo') {
                            var imagenLi = "<div class='w3-col w3-margin-right' style='width: 85px'>" +
                                "<img src='" + jsonSeccion.Imagen + "' style='width:100%'>" +
                                "</div>";

                            var textoLi = "<div class='w3-rest'>" +
                                "<a href='" + jsonSeccion.URL + "' target='_blank' class='w3-hover-text-theme-red tituloUrl'>" + jsonSeccion.Descripcion + "</a>" +
                                "</div>";

                            $("#ulComoPuedo").append($('<li>').html(imagenLi + textoLi));
                        }
                        else {
                            var seccionAlias = "#" + jsonSeccion.Seccion,
                                img = $(seccionAlias).find("img"),
                                titulo = $(seccionAlias).find("a.tituloUrl"),
                                link = $(seccionAlias).find("a.descripcionUrl"),
                                divNota = $(seccionAlias).find("div.notaImgAnclaText"),
                                iframe = $(seccionAlias).find("iframe");

                            if (jsonSeccion.URL.indexOf("www.facebook.com/plugins/") != -1) {
                                $(iframe).show();
                                $(img).hide();
                                $(divNota).hide();
                                $(iframe).attr('src', jsonSeccion.URL);
                            }
                            else {
                                $(iframe).hide();
                                $(img).attr('src', jsonSeccion.Imagen);
                                $(titulo).html(jsonSeccion.Titulo);
                                $(link).html(jsonSeccion.Descripcion);
                                $(titulo).attr('href', jsonSeccion.URL);
                                $(titulo).attr('target', '_blank');
                                $(link).attr('href', jsonSeccion.URL);
                                $(link).attr('target', '_blank');
                            }


                            if (pParametrosSeccion.pAliasPagina == 'INI' && jsonSeccion.Seccion == 'sec_Loteria') {
                                var fechaStr = fechaActualObtener('str');
                                $("#lblFechaLoteria").html(fechaStr);
                            }
                        }
                    }
                });
            }
            else {
                swal("Error al cargar los enlaces", jsonResponse.mensaje, "warning");
            }
        }),
        error: (function (xhr, status, error) {
            swal("Error al cargar los enlaces", error, "error")
        })
    });
}

function anunciosPaginaCargar(pParametrosSeccion) {
    $.ajax({
        url: "/modelo/mAnunciosObtener.php",
        async: false,
        success: (function (response) {
            if ($.trim(response) == '') return;
            var jsonResponse = JSON.parse(response);
            if (jsonResponse.Estado == 'OK') {
                var registros = jsonResponse.Datos;
                registros.forEach(function (jsonAnuncio) {
                    var seccionAlias = "#" + jsonAnuncio.alias,
                        img = $(seccionAlias).find("img"),
                        link = $(seccionAlias).find("a");

                    $(img).attr('src', jsonAnuncio.image);

                    if (jsonAnuncio.url != '') {
                        $(link).attr('href', jsonAnuncio.url);
                        $(link).attr('target', '_blank');
                    }
                    else
                        $(link).css('cursor', 'default');
                });
            }
            else {
                swal("Error al cargar anuncios:", jsonResponse.mensaje, "warning");
            }
        }),
        data: {
            'cityid': pParametrosSeccion.pCiudad_ID,
            'countrycode': pParametrosSeccion.pPais_ID,
            'pagealias': pParametrosSeccion.pAliasPagina,
            'categoryid': pParametrosSeccion.pIdCategoria
        },
        type: 'POST',
        error: (function (xhr, status, error) {
            swal("Error al cargar anuncios:", error, "error")
        })
    });
}

function mesNombreObtener(pMesNumero) {
    var mesNombre = '';
    switch (parseInt(pMesNumero)) {
        case 1:
            mesNombre = "Enero";
            break;
        case 2:
            mesNombre = "Febrero";
            break;
        case 3:
            mesNombre = "Marzo";
            break;
        case 4:
            mesNombre = "Abril";
            break;
        case 5:
            mesNombre = "Mayo";
            break;
        case 6:
            mesNombre = "Junio";
            break;
        case 7:
            mesNombre = "Julio";
            break;
        case 8:
            mesNombre = "Agosto";
            break;
        case 9:
            mesNombre = "Septiembre";
            break;
        case 10:
            mesNombre = "Octubre";
            break;
        case 11:
            mesNombre = "Noviembre";
            break;
        case 12:
            mesNombre = "Diciembre";
            break;
    }

    return mesNombre;
}

function setCookie(cname, cvalue, numdays) {
    var d = new Date();
    d.setTime(d.getTime() + (numdays * 60 * 60 * 1000));
    var expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + "; " + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}