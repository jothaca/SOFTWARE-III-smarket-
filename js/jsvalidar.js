var array=[];

$( document ).ready(function() {

    $.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "validar"
		},
		success: function(respuesta){
			if (respuesta == "noExiste") {
				window.location = "login.html"
			}
			else{
				$("#titulo").html("Bienvenido " + respuesta[0].Nombre);
				$("#foto").attr("src", "includes/imagenes/perfil/" + respuesta[0].Foto);
			}
		},
		error: function(error){

		}
	})

	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "cargarUsuarios"
		},
		success: function(respuesta){
			if(respuesta != "No se encontraron resultados"){
					var tabla=$('#contenido');
					for(var i in respuesta){
						var ob={'username':respuesta[i].username, 'nombres':respuesta[i].nombres, 'apellidos':respuesta[i].apellidos};
						array.push(ob);
						var indice=array.indexOf(ob);
						var fila='<tr id="cad'+indice+'">';
						fila+='<td id="username'+indice+'">'+respuesta[i].username+'</td>';
						fila+='<td>'+respuesta[i].nombres+'</td>';
						fila+='<td>'+respuesta[i].apellidos+'</td>';

						//fila+='<td><img src="'+r[i].foto+'"></td>';
						fila+='<td><button id="btnAgregar'+ indice + '" value="' + indice + '" type="button" class="btn btn-success">Agregar</button>'+'</td></tr>';
						tabla.append(fila);
						$('#btnAgregar'+ indice).on('click', agregar);
					}
				}
		},
		error: function(error){

		}
	})


	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "cargarAmigos"
		},
		success: function(respuesta){
			if(respuesta != "No se encontraron resultados"){
					var tabla=$('#amigos');
					for(var i in respuesta){
						var ob={'username':respuesta[i].useramigo, 'nombres':respuesta[i].nombreamigo};
						array.push(ob);
						var indice=array.indexOf(ob);
						var fila='<tr id="cad'+indice+'">';
						fila+='<td id="username'+indice+'">'+respuesta[i].useramigo+'</td>';
						fila+='<td>'+respuesta[i].nombreamigo+'</td>';

						//fila+='<td><img src="'+r[i].foto+'"></td>';
						tabla.append(fila);
					}
				}
		},
		error: function(error){

		}
	})

	
//CARGAR TIENDAS------------------------------------------------------
	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "cargarTiendas"
		},
		success: function(respuesta){
			if(respuesta != "No se encontraron resultados"){
				var tabla=$('#tiendas');
				for(var i in respuesta){
					var ob={'nombretienda':respuesta[i].nombretienda, 'tipo':respuesta[i].tipo, 'barrio':respuesta[i].barrio, 'direccion':respuesta[i].direccion};
					array.push(ob);
					var indice=array.indexOf(ob);
					var fila='<tr id="cad'+indice+'">';
					fila+='<td id="'+indice+'">'+respuesta[i].nombretienda+'</td>';
					fila+='<td>'+respuesta[i].tipo+'</td>';
					fila+='<td>'+respuesta[i].barrio+'</td>';
					fila+='<td>'+respuesta[i].direccion+'</td>';					

					//fila+='<td><img src="'+r[i].foto+'"></td>';
					fila+='<td><button id="btnVisitar'+ indice + '" href="' + indice + '" type="button" class="btn btn-success">Visitar</button>'+'</td></tr>';
					tabla.append(fila);
					$('#btnReservar'+ indice).on('click', reservar);
				}
			}
		},
		error: function(error){

		}
	})


$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "reservasPerfil"
		},
		success: function(respuesta){
			if(respuesta != "No se encontraron resultados"){
					var tabla=$('#reservasPerfil');
					for(var i in respuesta){
						var ob={'nombrehotel':respuesta[i].nombrehotel, 'capacidad':respuesta[i].capacidad, 'tipo':respuesta[i].tipo, 'tarifa':respuesta[i].tarifa};
						array.push(ob);
						var indice=array.indexOf(ob);
						var fila='<tr id="cad'+indice+'">';
						fila+='<td id="username'+indice+'">'+respuesta[i].nombrehotel+'</td>';
						fila+='<td>'+respuesta[i].capacidad+'</td>';
						fila+='<td>'+respuesta[i].tipo+'</td>';
						fila+='<td>'+respuesta[i].tarifa+'</td>';

						//fila+='<td><img src="'+r[i].foto+'"></td>';
						tabla.append(fila);
					}
				}
		},
		error: function(error){

		}
	})


});

function agregar(){
		var cont=0;
		for(j in array){
			if(cont==$(this).val()){
				var amigo = array[j].username;
				var nombreAmigo = array[j].nombres;
				$.ajax({
					url: 'controlador/controladora.php',
					type: 'POST',
					dataType : 'json',
					data: {
						method: 'agregarAmigo',
						amigo: amigo,
						nombreAmigo: nombreAmigo
					},
					success: function (r) {
						console.log(r);
						alert(r);
					},
					error: function (e) {
						console.log(e);
					}
				});
				break;
			}
			else{
				cont=cont+1;
			}
		}
	}

function reservar(){
		var cont=0;
		for(j in array){
			if(cont==$(this).val()){
				var hotel = array[j].nombrehotel;
				var capacidad = array[j].capacidad;
				var tipo = array[j].tipo;
				var tarifa = array[j].tarifa;

				$.ajax({
					url: 'controlador/controladora.php',
					type: 'POST',
					dataType : 'json',
					data: {
						method: 'reservar',
						hotel: hotel,
						capacidad: capacidad,
						tipo: tipo,
						tarifa: tarifa
					},
					success: function (r) {
						console.log(r);
						alert(r);
					},
					error: function (e) {
						console.log(e);
					}
				});
				break;
			}
			else{
				cont=cont+1;
			}
		}
	}