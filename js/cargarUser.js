$(document).ready(function(){
	$.ajax({
        url: 'controlador/controladora.php',
        type: 'POST',
        dataType: 'json',
        data: {
            method: "cargarUsuarios"
        },
        success: function(respuesta){
            //var nom = respuesta[0].username;
            //alert(nom);
            for(var i = 0 in respuesta){
                var dato = '<option val="'+respuesta[i].username+'" name="nomTend">' +respuesta[i].username+ '</option>';
                $('#nomUser').append(dato);
            }
        
        }
    })

})