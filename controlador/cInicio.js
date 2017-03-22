var sessionJsonCategorias;
var sessionJsonSubCategorias;
var MAX_ENESTEMES = MAX_EVENTOS = 2;
var jsonEventosMes;
var jsonEventosProximos;

function fechaActualObtener(pFormato) {
    var fechaActual = new Date(),
        fecha = null,
        diaSemana = fechaActual.getDay(),
        dia = fechaActual.getDate(),
        mes = fechaActual.getMonth() + 1,
        anio = fechaActual.getFullYear(),
        diasSemanaStr = new Array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");

    if (pFormato == 'str') {
        fecha = diasSemanaStr[diaSemana] + ' ' + dia + ' de ' + mesNombreObtener(mes) + ' de ' + anio;
    }

    return fecha;
}

function categoriasIniMostrar() {
    var indice = 0;
    sessionJsonCategorias.forEach(function (jsonCategoria) {
//        console.log(jsonCategoria);
        var clasificacion = jsonCategoria.Clasificacion,
            categoria = jsonCategoria.Categoria,
            categoriaID = jsonCategoria.Categoria_ID,
            textoLi = "<a style='cursor:pointer;' onclick=\"subCategoriasObtener(" + indice + ");\"" +
                "class='w3-hover-text-theme-red'>" + categoria + "</a>",
            liCategoria = "#liCategoria_" + categoriaID,
            liCategoriaAcc = "#liCategoriaAcc_" + categoriaID;

        if (clasificacion == "Individuos y Familia") {
            $("#ulIndividuosFamilia").append($('<li id="liCategoria_' + categoriaID + '">').html(textoLi));
            $("#ulIndividuosFamiliaAcc").append($('<li id="liCategoriaAcc_' + categoriaID + '">').html(textoLi));
        }
        else if (clasificacion == "Empresas") {
            $("#ulEmpresas").append($('<li id="liCategoria_' + categoriaID + '">').html(textoLi));
            $("#ulEmpresasAcc").append($('<li id="liCategoriaAcc_' + categoriaID + '">').html(textoLi));
        }
        else if (clasificacion == "Turistas") {
            $("#ulTuristas").append($('<li id="liCategoria_' + categoriaID + '">').html(textoLi));
            $("#ulTuristasAcc").append($('<li id="liCategoriaAcc_' + categoriaID + '">').html(textoLi));
        }

        $(liCategoria).append($('<ul id="ulSubcategorias_' + categoriaID + '" style="display:none">').html('<li></li>'));
        $(liCategoriaAcc).append($('<ul id="ulSubcategoriasAcc_' + categoriaID + '" style="display:none">').html('<li></li>'));

        if (typeof sessionJsonSubCategorias == 'undefined') {
            sessionJsonSubCategorias = new Array();
            sessionJsonSubCategorias[categoria] = 'undefined';
        }
        else if (sessionJsonSubCategorias[categoria] == null)
            sessionJsonSubCategorias[categoria] = 'undefined';
        indice++;
    });
}

function subCategoriasObtener(pIndice) {
    var jsonCategoria = sessionJsonCategorias[pIndice],
        categoria = jsonCategoria.Categoria,
        categoriaID = jsonCategoria.Categoria_ID;

    if ($("#sec_CategoriasListado").css('display') == 'block')
        var ulSubcategorias = '#ulSubcategorias_' + categoriaID;
    else if ($("#sec_CategoriasListadoAcc").css('display') == 'block')
        var ulSubcategorias = '#ulSubcategoriasAcc_' + categoriaID;

    if ($(ulSubcategorias).css('display') == 'block') {
        $(ulSubcategorias).hide();
        return;
    }

    if ((sessionJsonSubCategorias[categoria] != 'undefined') &&
        (sessionJsonSubCategorias[categoria] != 'Ninguna')) {
        subCategoriasMostrar(pIndice, ulSubcategorias);
    }
    else if (sessionJsonSubCategorias[categoria] == 'Ninguna') {
        contenidoIndexCargar({vista: 'vCategorias', alias: 'CAT', categoria: categoria, categoriaID: categoriaID});
    }
    else {
        $.post('modelo/mListaSubCategoriasObtener.php', {'pIdCategoria': categoriaID},
            function (subcategorias, status) {
                if (status == 'success') {
                    if (subcategorias != '') {
                        sessionJsonSubCategorias[categoria] = subcategorias;
                        subCategoriasMostrar(pIndice, ulSubcategorias);
                    }
                    else {
                        sessionJsonSubCategorias[categoria] = 'Ninguna';
                        contenidoIndexCargar({
                            vista: 'vCategorias',
                            alias: 'CAT',
                            categoria: categoria,
                            categoriaID: categoriaID
                        });
                    }
                }
            });
    }
}

function subCategoriasMostrar(pIndice, pulSubcategorias) {
    var jsonCategoria = sessionJsonCategorias[pIndice],
        categoria = jsonCategoria.Categoria,
        categoriaID = jsonCategoria.Categoria_ID,
        jsonSubCategorias = JSON.parse(sessionJsonSubCategorias[categoria]);

    $(pulSubcategorias).empty();
    jsonSubCategorias.forEach(function (jsonSubcategoria) {
        var subCategoria = jsonSubcategoria.title,
            subCategoriaID = jsonSubcategoria.id_subcategory,
            textoLi = "<a style='cursor:pointer;' " +
                "onclick=\"contenidoIndexCargar({vista: 'vCategorias', alias: 'SUBCAT', categoria: '" + categoria + "', categoriaID: " + categoriaID + ", subcategoria: '" + subCategoria + "', subcategoriaID: " + subCategoriaID + "});\"" +
                "class='w3-hover-text-theme-red'>" + subCategoria + "</a>";

        $(pulSubcategorias).append($('<li>').html(textoLi));
    });

    $(pulSubcategorias).show();
}

function seccionEnEsteMesCargar(pParametros) {
    $.post('modelo/mEnEsteMesObtener.php', pParametros, function (urls, status) {
        if (status == 'success') {
            if (urls == '') {
                $("#ulEnEsteMes").append($('<li>').html("<span class='urlDescripcion'>Proximamente ...</span>"));
                return;
            }

            var jsonUrls = JSON.parse(urls);
            jsonEventosMes = jsonUrls;

            for (var i = 0; i < MAX_ENESTEMES; i++) {
                var fecha = jsonUrls[i].Fecha,
                    diaMes = fecha.substr(8, 2),
                    mesNombre = mesNombreObtener(fecha.substr(5, 2)),

                    fechaLi = "<div class='w3-border-right w3-col' align='center' style='width: 70px'>" +
                        "<span class='dia'>" + diaMes + "</span><br><span class='mes'>" + mesNombre + "</span>" +
                        "</div>",

                    textoLi = "<div class='w3-rest w3-padding'>" +
                        "<span>" + jsonUrls[i].Titulo + "</span><br>" +
                        "</div>";

                $("#ulEnEsteMes").append($('<li class="w3-margin-top w3-padding-8 w3-border-0">').html(fechaLi + textoLi));
            }
        }
    });
}

function seccionEventosCargar(pParametros) {
    $.post('modelo/mEventosObtener.php', pParametros, function (urls, status) {
        if (status == 'success') {
            if (urls == '') {
                $("#ulEventos").append($('<li>').html("<span class='urlDescripcion'>Proximamente ...</span>"));
                return;
            }

            var jsonUrls = JSON.parse(urls);
            jsonEventosProximos = jsonUrls;

            for (var i = 0; i < MAX_EVENTOS; i++) {
                var fecha = jsonUrls[i].Fecha,
                    diaMes = fecha.substr(8, 2),
                    mesNombre = mesNombreObtener(fecha.substr(5, 2)),

                    fechaLi = "<div class='w3-border-right w3-col' align='center' style='width: 70px'>" +
                        "<span class='dia'>" + diaMes + "</span><br><span class='mes'>" + mesNombre + "</span>" +
                        "</div>",

                    textoLi = "<div class='w3-rest w3-padding'>" +
                        "<span>" + jsonUrls[i].Titulo + "</span><br>" +
                        "</div>";

                $("#ulEventos").append($('<li class="w3-margin-top w3-padding-16 w3-border-0">').html(fechaLi + textoLi));
            }
        }
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