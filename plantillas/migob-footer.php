<!-- Footer -->
<footer id="fPiePagina" class="w3-section">
    <div class="w3-row-padding w3-theme-grey-d5 w3-padding-8">
        <div class="w3-threequarter">
            <span class="fontFooter">SUSCRÍBETE A NUESTRO BOLETÍN ELECTRÓNICO&nbsp;&nbsp;</span>
            <input type="text" id="emailParaNewsletter" style="width: 50%" placeholder="Introduce tu e-mail">&nbsp;&nbsp;
            <button id="sendemail" class="w3-btn w3-round w3-theme-blue w3-hover-theme-red w3-textBtn-theme-blue">
                ENVIAR
            </button>
        </div>
        <div class="w3-quarter w3-right-align">
            <span class="w3-small w3-text-light-grey">SÍGUENOS</span>&nbsp;&nbsp;&nbsp;
            <a href="https://www.facebook.com/migobierno/" title="facebook" target="_blank">
                <i class="fa fa-facebook-square fa-2x w3-show-inline-block w3-hover-text-theme-blue"></i>
            </a>&nbsp;
            <a href="http://twitter.com/migobiernocom" title="twitter" target="_blank">
                <i class="fa fa-twitter-square fa-2x w3-show-inline-block w3-hover-text-theme-blue"></i>
            </a>&nbsp;
            <a href="https://www.youtube.com/channel/UCX_fqyxWeBElivzmN395i4Q" title="youtube"
               target="_blank">
                <i class="fa fa-youtube-square fa-2x w3-show-inline-block w3-hover-text-theme-blue"></i>
            </a>&nbsp;
            <a href="https://www.instagram.com/migobiernocom/" title="instagram"
               target="_blank">
                <i class="fa fa-instagram fa-2x w3-show-inline-block w3-hover-text-theme-blue"></i>
            </a>
        </div>
    </div>
    <div class="w3-row-padding w3-theme-grey-d4 w3-padding-64">
        <div class="w3-quarter w3-margin-top">
            <a href="#"><img src="/imagenes/LogotipoPieMiGobiernocom.png"
                             style="width:100%"></a>
        </div>
        <div class="w3-threequarter w3-margin-top" style="padding-top: 60px;">
            <a class="w3-btn w3-border-left w3-border-right btnBarFooter" href="/index.php">Inicio</a>
            <a class="w3-btn w3-border-right btnBarFooter" href="/en-este-mes/">En este mes</a>
            <a class="w3-btn w3-border-right btnBarFooter" href="/eventos/">Eventos</a>
            <a class="w3-btn w3-border-right btnBarFooter" href="/quienes-somos/">Quiénes somos</a>
            <a class="w3-btn w3-border-right btnBarFooter" href="/contactanos">Contáctanos</a>
        </div>
    </div>
</footer>

<!-- Scripts -->
<script src="/_lib/jquery-1.12.4.min.js"></script>
<script src="/_lib/jquery-ui-1.12.1/jquery-ui.js"></script>
<script src="/_lib/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src='/_jscript/jquery.validate.min.js'></script>
<script type="text/javascript" src="/_jscript/sidenav.js?v=1"></script>

<script type="text/javascript" src="/controlador/cVersionesControladores.js"></script>

<!--Búsqueda de ciudades-->
<script type="text/javascript">
    // Computadora
    $(function () {
        var cacheCiudades = {};
        var paisID = 'USA';
        $("#listaCiudades").autocomplete({
            minLength: 3,
            source: function (request, response) {
                var term = request.term;
                if (term in cacheCiudades) {
                    response(cacheCiudades[term]);
                    return;
                }

                $.getJSON("/modelo/mListaCiudadesObtener.php?pPais_ID=" + paisID, request, function (data, status, xhr) {
                    cacheCiudades[term] = data;
                    response(data);
                });
            },
            select: function (event, ui) {
                ciudadParametrosCargar(event, ui.item.id, ui.item.value, paisID);
            }
        });
    });

    // Móvil
    $(function () {
        var cacheCiudades = {};
        var paisID = 'USA';
        $("#listaCiudadesM").autocomplete({
            minLength: 3,
            source: function (request, response) {
                var term = request.term;
                if (term in cacheCiudades) {
                    response(cacheCiudades[term]);
                    return;
                }

                $.getJSON("/modelo/mListaCiudadesObtener.php?pPais_ID=" + paisID, request, function (data, status, xhr) {
                    cacheCiudades[term] = data;
                    response(data);
                });
            },
            select: function (event, ui) {
                ciudadParametrosCargar(event, ui.item.id, ui.item.value, paisID);
            }
        });
    });

</script>

<script type="text/javascript">
    $(document).ready(function () {
        obtenerVersionControladores();
        cargarControlador("cSuscripcionNewsLetter");
    });
</script>

<!-- GoogleAnalytics -->
<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-85660693-1', 'auto');
    ga('send', 'pageview');

</script>

<!-- Facebook SDK -->
<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.8";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<!-- Twitter widgets -->
<script>!function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
        if (!d.getElementById(id)) {
            js = d.createElement(s);
            js.id = id;
            js.src = p + '://platform.twitter.com/widgets.js';
            fjs.parentNode.insertBefore(js, fjs);
        }
    }(document, 'script', 'twitter-wjs');</script>
