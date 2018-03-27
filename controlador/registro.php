<?php

include_once("../modelo/usuario.php");
include_once("../modelo/imagen.php");
include_once("../modelo/CRUDusuario.php");

session_start();

if(isset($_POST['registrar'])){
	$nombres = $_REQUEST['nombres'];
	$apellidos = $_REQUEST['apellidos'];
	$username = $_REQUEST['username'];
	$email = $_REQUEST['email'];
	$fecha = $_REQUEST['fecha'];
	$sexo = $_REQUEST['sexo'];
	$ciudad = $_REQUEST['ciudad'];
	$pais = $_REQUEST['pais'];
	$pass = $_REQUEST['pass'];
	$pass1 = $_REQUEST['pass1'];
	$rol = $_REQUEST['tipo_user'];

	$carpeta = "../includes/imagenes/perfil/";
	opendir($carpeta);
	$destino = $carpeta.$_FILES['foto']['name'];
	copy($_FILES['foto']['tmp_name'], $destino);
	$imagen = $_FILES['foto']['name'];

	$CRUDu = new CRUDusuario();
	$usuario = new Usuario($nombres, $apellidos, $username, $email, $fecha, $sexo, $ciudad, $pais, $pass, $imagen, $rol);
	$CRUDu->registrar($usuario);

	if($CRUDu->getM() == "Exito")
	header("Location:../index.html");
}

if(isset($_POST['subirFoto'])){
	if (isset($_SESSION['username'])) {
		$username = $_SESSION['username'];
		$nombreAlbum = $_REQUEST['nombreAlbum'];
		$nombreFoto = $_REQUEST['nombreFoto'];
		$lugarFoto = $_REQUEST['lugarFoto'];
		$latitud = $_REQUEST['lat'];
		$longitud = $_REQUEST['lng'];

		$carpeta = "../includes/imagenes/albums/";
		opendir($carpeta);
		$destino = $carpeta.$_FILES['foto']['name'];
		copy($_FILES['foto']['tmp_name'], $destino);
		$imagen = $_FILES['foto']['name'];

		$CRUDu = new CRUDusuario();
		$foto = new Imagen($username, $nombreAlbum, $nombreFoto, $lugarFoto, $latitud, $longitud, $imagen);
		$CRUDu->subirFoto($foto);

		if($CRUDu->getM() == "Exito")
		header("Location:../albums.html");
	}
}
?>
