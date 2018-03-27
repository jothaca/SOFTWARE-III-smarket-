<?php

class Tienda
{
private $nombre;
private $tipo;
private $dueno;
private $barrio;
private $direccion;
private $telefono;
private $descripcion;


public function __construct($nombre, $tipo, $dueno, $barrio, $direccion, $telefono, $descripcion)
{
	$this->nombre = $nombre;
	$this->tipo = $tipo;
	$this->dueno = $dueno;
	$this->barrio = $barrio;
	$this->direccion = $direccion;
	$this->telefono = $telefono;
	$this->descripcion = $descripcion;
}
//set  y get
public function getNombre()
{
	return($this->nombre);	
}
public function getTipo()
{
	return($this->tipo);	
}
public function getDueno()
{
	return($this->dueno);	
}
public function getBarrio()
{
	return($this->barrio);	
}
public function getDireccion(){
	return ($this->direccion);
}
public function getTelefono(){
	return($this->telefono);
}
public function getDescripcion(){
	return($this->descripcion);
}



public function setNombre()
{
$this->Nombre=Nombre;	
}
public function setTipo()
{
$this->Tipo=Tipo;	
}
public function setDueno()
{
$this->Dueno=Dueno;	
}
public function setBarrio()
{
$this->Barrio=Barrio;	
}
public function setDireccion()
{
$this->Direccion=Direccion;	
}
public function setTelefono()
{
$this->Telefono=Telefono;	
}
public function setDescripcion()
{
$this->Descripcion=Descripcion;	
}

}
?>