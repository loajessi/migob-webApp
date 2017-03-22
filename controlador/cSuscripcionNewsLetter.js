$(document).ready(function()
    {
		function isEmail(email) 
		{
			var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				return regex.test(email);
		}
	$('#sendemail').click(function(){
		
		if(isEmail($('#emailParaNewsletter').val()))
		{
			$.post("/modelo/mEnviaCorreoValidacion.php",
	                        {
	                            email:$('#emailParaNewsletter').val()
	                        },
	                        function(data) 
	                        {
	                                                       
	                            // RECUPERA Y DIVIDE LA INFORMACION OBTENIDA POR AJAX Y SE PONE EN EL FORMULARIO
	                            var jsonResponse = JSON.parse(data);
	                            
	                            if(jsonResponse.Estado == 'OK')
	                                                      
	                            	alert(jsonResponse.mensaje);
								else
									alert('Error: '+jsonResponse.mensaje);
	                  
	                        } 
	                       );
        }
        else
        {
	        alert("El correo proporcionado no parece valido");
        }
        
	});	
	});