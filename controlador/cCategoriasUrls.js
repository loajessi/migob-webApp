function categoriasCargarSecciones(){
    var jsonParametros = ciudadParametrosObtener();

    jsonParametros.pIdCategoria = $("#hdnCategoriaID").val();
    jsonParametros.pCategoriaTitulo = $("#hdnCategoria").val();
    jsonParametros.pIdSubCategoria = $("#hdnSubcategoriaID").val();
    jsonParametros.pSubcategoriaTitulo = $("#hdnSubcategoria").val();

    // Secciones Ancla y Anuncios
    seccionesPaginaCargar(jsonParametros);
    anunciosPaginaCargar(jsonParametros);

    // Contenido
    listaUrlsCategoriasSubcategoriasCargar(jsonParametros);
}

function listaUrlsCategoriasSubcategoriasCargar(pParametros) {
    $.ajax({
        url: '/modelo/mListaUrlsCategoriaObtener.php',
        async: false,
        type: 'POST',
        data: {
            'pCategoria_ID': pParametros.pIdCategoria,
            'pSubCategoria_ID': pParametros.pIdSubCategoria,
            'pCiudad_ID': pParametros.pCiudad_ID,
            'pPais_ID': pParametros.pPais_ID
        },
        success: (function (response) {
            $("#spnTituloCategoria").html(pParametros.pCategoriaTitulo);
            if (pParametros.pAliasPagina == 'SUBCAT')
                $("#spnTituloSubCategoria").html(pParametros.pSubcategoriaTitulo);

            if (response == '') {
                $("#ulUrlsCategoria").append($('<li>').html("<span class='urlDescripcion'>Próximamente ...</span>"));
                return;
            }

            var jsonResponse = JSON.parse(response);

            if (jsonResponse.Estado == 'OK') {
                var jsonUrls = jsonResponse.Datos;
                jsonUrls.forEach(function (jsonSeccion) {
                    var textoLi = "<a href=" + jsonSeccion.URL + " target='_blank' class='urlSeccion w3-hover-text-theme-red'>" +
                            jsonSeccion.Titulo + "</a><br/>",
                        descripcionLi = "<span class='urlDescripcion'>" + jsonSeccion.Descripcion + "</span>";

                    $("#ulUrlsCategoria").append($('<li>').html(textoLi + descripcionLi));

                });
            }
            else {
                swal("Error al cargar la página", jsonResponse.mensaje, "warning");
            }
        }),
        error: (function (xhr, status, error) {
            swal("Error al cargar la página", error, "error");
        })
    });
}