// Script to open and close sidenav
function navBar_open() {
    $("#navBarraMenu").show();
    $("#myOverlay").show();
}

function navBar_close() {
    $("#navBarraMenu").hide();
    $("#myOverlay").hide();
}

function barraLateralCargar() {
    // SideNav
    $.ajax({
        async: true,
        url: "/sideBar.php",
        type: 'GET',
        success: function (data, status, xhr) {
            $("#navBarraMenu").html(data);
        }
    });
}