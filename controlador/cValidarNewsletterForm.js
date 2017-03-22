$(document).ready(function()
    {


		$("#formNewsletter").validate({
		  rules: {
		    asunto: "required",
		    remitente: {
		    required: true,
		      email: true
		    },
		    admin: {
		    required: true,
		      email: true
		    },
		    imagen: {
      required: true,
      accept: "image/*"
    }
		  },
		  messages: {
		    asunto: "Especifique un asunto",
		    remitente: {
		      required: "El remitente es obligatorio",
		      email: "El remitente no tiene un formato de correo valido"
		    },
		    admin: {
		      required: "La direccion de notificaciones obligatoria",
		      email: "La direccion para notificacion no parece tener un formato de correo valido"
		    },
		    imagen: {
      required: "La imagen principal es obligatoria",
      accept: "El archivo seleccionado no parece ser una imagen"
    }
		  }
		});
	});	