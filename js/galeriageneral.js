$(document).ready(function(){
	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "galeriaGeneral"
		},
		success: function(respuesta){
			for(var i = 0; i<10; i++){
				$("#cuadro"+i).hide();

			}

			var largo = respuesta.length;
			for(var i = 0 in respuesta){
				$("#cuadro"+i).show();
				$("#imagen"+i).attr("src", "includes/imagenes/albums/" + respuesta[i].imagen).show();
				$("#parrafo"+i).html("Tomada en: " + respuesta[i].lugar).show();
			}
		}
	})
})