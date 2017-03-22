// Arreglo para objetos con controladores y versiones ya cargados en la memoria
var sesionControladoresCargados = [];
// Objeto para versiones de controladores a utilizar
var sesionVersionControladores = {};

// Carga y actualización dinámica de controladores bajo demanda
function cargarControlador(pControlador) {
    // Datos del controlador cargado
    var objControladorCargado = $.grep(sesionControladoresCargados, function (e) {
            return e.nombre == pControlador;
        }),
        controladorCargadoVersion = 0;

    // Versión del controlador cargado, si existe
    if (objControladorCargado.length > 0) {
        controladorCargadoVersion = objControladorCargado[0].version;
    }

    // Detección de controladores no registrados en el sistema
    if (typeof sesionVersionControladores[pControlador] == 'undefined') {
        console.warn('El controlador no fue dado de alta correctamente. (' + pControlador + ') Se asume "1".');
        sesionVersionControladores[pControlador] = 1;
    }

    // Comprueba si se requiere actualizar la versión del controlador cargado
    if (controladorCargadoVersion >= sesionVersionControladores[pControlador]) {
//        console.info('No se requiere actualización. ' + pControlador + ' (v' + controladorCargadoVersion + ')');
        return; // Sale de la función, pues el controlador requerido ya está cargado
    }

//    console.info('Cargando controlador... ' + pControlador + ' (v' + controladorCargadoVersion + ' --> v' + sesionVersionControladores[pControlador] + ')');

    // Carga del controlador especificado
    $.ajax({
        url: '/controlador/' + pControlador + '.js',
        dataType: 'script',
        async: false
    });

    // Actualización del arreglo de controladores cargados, según el caso
    if (objControladorCargado.length > 0) {
        // Buscar el objeto del controlador actual y actualizar su versión
        $.each(sesionControladoresCargados, function (i) {
            if (sesionControladoresCargados[i].nombre == pControlador) {
                sesionControladoresCargados[i].version = sesionVersionControladores[pControlador];
            }
        });
    } else {
        // Agregar el objeto del nuevo controlador al arreglo de controladores cargados
        sesionControladoresCargados.push({"nombre": pControlador, "version": sesionVersionControladores[pControlador]});
    }
}

// Obtener los números de versión para los controladores
function obtenerVersionControladores() {
   /* $.getJSON('controlador/appVersionesControladores.json.php').done(function (obj) {
        sesionVersionControladores = obj;
    }).fail(function () {
        console.error('Error durante la obtención de versión de controladores.');
    });*/

    $.ajax({
        url: '/controlador/appVersionesControladores.json.php',
        async: false,
        type: 'GET',
        success: function (data, status, xhr) {
            sesionVersionControladores = data;
        }
    })
}