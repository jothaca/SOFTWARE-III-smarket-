$( document ).ready(function() {
    $.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "validarPerfil"
		},
		success: function(respuesta){

			//alert(respuesta);
			
			if(respuesta == "tendero"){
				$("#iniciarI").hide();
				$("#crearI").hide();
				$("#admin").hide();

			}else if(respuesta == "admin"){
				$("#iniciarI").hide();
				$("#crearI").hide();
				$("#perfilI").hide();
				$("#adminTienda").hide();
			}
			else if(respuesta == "usuario"){
				$("#iniciarI").hide();
				$("#crearI").hide();
				$("#admin").hide();
				$("#adminTienda").hide();
			}
			else{
				$("#admin").hide();
				$("#cerrar").hide();
				$("#perfilI").hide();
				$("#adminTienda").hide();
			}
		},
		error: function(error){
		}
	})
});