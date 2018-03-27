$(document).ready(ini);


function ini(){
	$("#login").click(login);
	$("#cerrar").click(cerrar);
	$("#crearAlbum").click(crearAlbum);
	$("#agregarAmigo").click(agregarAmigo);
	$("#registrarTienda").click(agregarTienda);
	$("#eliminarTienda").click(eliminarTienda);
	$("#eliminarUser").click(eliminarUser);
	//$("#registrarTienda").click(prueba);
}

function login(){
	var username = $("#username").val();
	var pass = $("#pass").val();
	var rol = $("#tipo_user").val();

	if (username != "" && pass != "") {
		$.ajax({
			url: 'controlador/controladora.php',
			type: 'POST',
			dataType: 'json',
			data:{
				method: "login",
				username: username,
				pass:pass,
				rol: rol
			},
			success: function(respuesta){
				console.log(respuesta);
				if (respuesta == "inicioad") {
					window.location = "admin.html";
				}
				if (respuesta == "inicioten") {
					window.location = "tendero.html";
				}
				else if(respuesta == "inicio"){
					window.location = "perfil.html";
				}
			},
			error: function(error){
				console.log(error);
			}
		})
	}
	else{
		alert("Complete los campos");
	}
}

function cerrar(){
	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data:{
			method: "cerrar"
		},
		success: function(respuesta){
			if (respuesta) {
				console.log(respuesta);
				window.location = "index.html";
			}else{
				console.log("nada");
			}
		},
		error: function(error){
			console.log(error);
		}
	})
}

function crearAlbum(){
	var nombreAlbum = $("#nombreAlbum").val();
 
	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "crearAlbum",
			nombreAlbum: nombreAlbum
		},
		success: function(respuesta){
			alert(respuesta);
		},
		error: function(error){
			console.log(error);
		}
	})

}

function agregarAmigo(){
	var amigo = $("#username").val();

	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "agregarAmigo",
			amigo: amigo
		},
		success: function(respuesta){
			if (respuesta == "Exito") {};
			alert("Amigo agregado");
		},
		error: function(error){
			console.log(error);
		}
	})
}

function agregarTienda(){
	var nomTienda = $("#nomTienda").val();
	var tipo = $("#tipoTienda").val();
	var dueno = $("#nomTend").val();
	var barrio = $("#barrioTienda").val();
	var direcc = $("#direccionTienda").val();
	var tele = $("#telefonoTienda").val();
	var descrip = $("#descripcion").val();

	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "agregarTienda",
			nomTienda: nomTienda,
			tipo: tipo,
			dueno: dueno,
			barrio: barrio,
			direcc: direcc,
			tele: tele,
			descrip: descrip
		},
		success: function(respuesta){
			if (respuesta == "Exito") {};
			alert("Tienda Agregada");
		},
		error: function(error){
			console.log(error);
		}
	})
}

function eliminarTienda(){
	
	var dueno = $("#nomTendE").val();

	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "eliminarTienda",
			dueno: dueno
		},
		success: function(respuesta){
			if (respuesta == "Exito") {};
			alert("Tienda Eliminada");
		},
		error: function(error){
			console.log(error);
		}
	})
}

function eliminarUser(){
	
	var user = $("#nomUser").val();

	$.ajax({
		url: 'controlador/controladora.php',
		type: 'POST',
		dataType: 'json',
		data: {
			method: "eliminarUser",
			user: user
		},
		success: function(respuesta){
			if (respuesta == "Exito") {};
			alert("Usuario Eliminado");
		},
		error: function(error){
			console.log(error);
		}
	})
}



function prueba(){
	var dueno = $("#nomTend").val();
	alert(dueno);
}