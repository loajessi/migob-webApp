function validarFormularioContacto() {

    $('#frmContactanos').validate({
        submitHandler: function (form) {
            $.post("/modelo/mEnviaCorreoContacto.php",
                {
                    email: $("#txtEmail").val(),
                    nombre: $("#txtNombre").val(),
                    telefono: $("#txtTelefono").val(),
                    direccion: $("#txtDireccion").val(),
                    mensaje: $('#txtaMensaje').val()
                },
                function (data) {

                    // RECUPERA Y DIVIDE LA INFORMACION OBTENIDA POR AJAX Y SE PONE EN EL FORMULARIO
                    alert(data);
                    contenidoIndexCargar({vista: 'vInicio', alias: 'INI'});

                }
            );
        },
        rules: {
            txtNombre: "required",
            txtTelefono: "required",
            txtDireccion: "required",
            txtEmail: {
                required: true,
                email: true
            },
            txtaMensaje: "required"
        },
        messages: {
            txtNombre: "El Nombre es requerido",
            txtTelefono: "El telefono es requerido",
            txtDireccion: "Direccion requerida",
            txtEmail: {
                required: "el correo es requerido",
                email: "el correo no parece ser valido"
            },
            txtaMensaje: "required"
        }
    });
}