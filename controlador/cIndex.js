function indexCargarSecciones() {
    var jsonParametros = ciudadParametrosObtener();

    // Secciones Ancla
    seccionesPaginaCargar(jsonParametros);
//  anunciosPaginaCargar(jsonParametrosSeccion);

    // Contenido
    // Categorías
    $.post('modelo/mListaCategoriasObtener.php', {'pPais_ID': 'USA'}, function (response, status) {
        if (status == 'success') {
            var jsonResponse = JSON.parse(response);

            if (jsonResponse.Estado == 'OK') {
                var jsonCategorias = jsonResponse.Datos;
                categoriasIniMostrar(jsonCategorias);
            }
            else {
                swal("Error al cargar lista de categorías", jsonResponse.mensaje, "warning");
            }
        }
    });

    // Resumen este mes y eventos
    enEsteMesCargar(jsonParametros);
    eventosCargar(jsonParametros);

    // Sección lo ultimo
    ultimoActualizar();

    // Noticias
    if ($.trim($("#sec_Noticias").html()) == '')
        $("#sec_Noticias").html($("#sec_NoticiasLoad").html());

}


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

function categoriasIniMostrar(pCategorias) {
    var iClasificacion = 0,
        clasificacionID_ant = -1,
        categoriaID_ant = -1;

    pCategorias.forEach(function (jsonCategoria) {
        var clasificacion = jsonCategoria.Clasificacion,
            clasificacionID = jsonCategoria.Clasificacion_ID,
            categoria = jsonCategoria.Categoria,
            categoriaID = jsonCategoria.Categoria_ID,
            subcategoria = jsonCategoria.Subcategoria,
            subcategoriaID = jsonCategoria.Subcategoria_ID;

        if (clasificacionID != clasificacionID_ant) {
            iClasificacion++;

            var tituloClasificacion = "#liTituloSeccion" + iClasificacion,
                tituloClasificacionAcc = "#lblTituloSeccion" + iClasificacion;

            $(tituloClasificacion).html(clasificacion);
            $(tituloClasificacionAcc).html(clasificacion);

            clasificacionID_ant = clasificacionID;
        }

        if (categoriaID != categoriaID_ant) {
            var textoLi = "<a id='lnkCategoria_" + categoriaID + "' style='cursor:pointer;' " +
                    "onclick=\"categoriaIr({'alias': 'CAT', 'categoria': '" + categoria + "', 'categoriaID': " + categoriaID + "});\"" +
                    "class='w3-hover-text-theme-red'>" + categoria + "</a>",
                textoLiAcc = "<a id='lnkCategoriaAcc_" + categoriaID + "' style='cursor:pointer;' " +
                    "onclick=\"categoriaIr({'alias': 'CAT', 'categoria': '" + categoria + "', 'categoriaID': " + categoriaID + "});\"" +
                    "class='w3-hover-text-theme-red'>" + categoria + "</a>",

                liCategoria = "#liCategoria_" + categoriaID,
                liCategoriaAcc = "#liCategoriaAcc_" + categoriaID,

                ulClasificacion = "#ulClasificacion" + iClasificacion,
                ulClasificacionAcc = "#ulClasificacionAcc" + iClasificacion;

            $(ulClasificacion).append($('<li id="liCategoria_' + categoriaID + '">').html(textoLi));
            $(ulClasificacionAcc).append($('<li id="liCategoriaAcc_' + categoriaID + '">').html(textoLiAcc));

            $(liCategoria).append($('<ul id="ulSubcategorias_' + categoriaID + '" style="display:none">'));
            $(liCategoriaAcc).append($('<ul id="ulSubcategoriasAcc_' + categoriaID + '" style="display:none">'));

            categoriaID_ant = categoriaID;
        }

        if (subcategoriaID != null) {
            var ulSubcategorias = "#ulSubcategorias_" + categoriaID,
                ulSubcategoriasAcc = "#ulSubcategoriasAcc_" + categoriaID,
                lnkCategoria = "#lnkCategoria_" + categoriaID,
                lnkCategoriaAcc = "#lnkCategoriaAcc_" + categoriaID,
                textoSubLi = "<a style='cursor:pointer;' " +
                    "onclick=\"categoriaIr({'alias': 'SUBCAT', 'categoria': '" + categoria + "', 'categoriaID': " + categoriaID + ", subcategoria: '" + subcategoria + "', subcategoriaID: " + subcategoriaID + "});\" " +
                    " class='w3-hover-text-theme-red'>" + subcategoria + "</a>";

            $(ulSubcategorias).append($('<li>').html(textoSubLi));
            $(ulSubcategoriasAcc).append($('<li>').html(textoSubLi));
            $(lnkCategoria).removeAttr('onclick');
            $(lnkCategoria).attr('onClick', 'subcategoriaMostrarOcultar(\'' + ulSubcategorias + '\')');
            $(lnkCategoriaAcc).removeAttr('onclick');
            $(lnkCategoriaAcc).attr('onClick', 'subcategoriaMostrarOcultar(\'' + ulSubcategoriasAcc + '\')');
        }
    });
}

function subcategoriaMostrarOcultar(pulSubcategorias) {
    if($(pulSubcategorias).css('display') == 'none')
        $(pulSubcategorias).show();
    else
        $(pulSubcategorias).hide();
}

function categoriaIr(pParametros) {
    $("#hdnCategoria").val(pParametros.categoria);
    $("#hdnCategoriaID").val(pParametros.categoriaID);

    if (pParametros.subcategoria != null)
        $("#hdnSubcategoria").val(pParametros.subcategoria);
    else
        $("#hdnSubcategoria").val(0);

    if (pParametros.subcategoriaID != null)
        $("#hdnSubcategoriaID").val(pParametros.subcategoriaID);
    else
        $("#hdnSubcategoriaID").val(0);

    $("#hdnAliasCategoria").val(pParametros.alias);
    $("#frmCategorias").submit();
}

function abrirCategoria(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}





