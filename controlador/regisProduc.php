<?php

include_once("../modelo/producto.php");
include_once("../modelo/imagen.php");
include_once("../modelo/CRUDproducto.php");

session_start();
$username = $_SESSION['username'];

if(isset($_POST['regisProduc'])){
	$codigo = $_REQUEST['codigo'];
	$nombre = $_REQUEST['nombre'];
	$marca = $_REQUEST['marca'];
	$precio = $_REQUEST['precio'];
	

	$carpeta = "../includes/imagenes/productos/";
	opendir($carpeta);
	$destino = $carpeta.$_FILES['foto']['name'];
	copy($_FILES['foto']['tmp_name'], $destino);
	$imagen = $_FILES['foto']['name'];

	$CRUDp = new CRUDproducto();
	$producto = new Producto($codigo, $nombre, $marca, $precio, $imagen);
	$CRUDp->registrar($producto, $username);

	if($CRUDp->getM() == "Exito")
	header("Location:../tendero.html");
}

?>