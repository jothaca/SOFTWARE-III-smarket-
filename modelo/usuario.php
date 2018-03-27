<?php

class Usuario
{
private $nombre;
private $apellido;
private $username;
private $email;
private $birthday;
private $sexo;
private $ciudad;
private $pais;
private $password;
private $foto;
private $rol;


public function __construct($nombre, $apellido, $username, $email, $birthday, $sexo, $ciudad, $pais, $password, $foto, $rol)
{
	$this->nombre = $nombre;
	$this->apellido = $apellido;
	$this->username = $username;
	$this->email = $email;
	$this->birthday = $birthday;
	$this->sexo = $sexo;
	$this->ciudad = $ciudad;
	$this->pais = $pais;
	$this->password = $password;
	$this->foto = $foto;
	$this->rol = $rol;
}
//set  y get
public function getNombre()
{
	return($this->nombre);	
}
public function getApellido()
{
	return($this->apellido);	
}
public function getUsername()
{
	return($this->username);	
}
public function getPassword()
{
	return($this->password);	
}
public function getEmail(){
	return ($this->email);
}
public function getSexo(){
	return($this->sexo);
}
public function getBirthday(){
	return($this->birthday);
}
public function getCiudad(){
	return($this->ciudad);
}
public function getPais(){
	return($this->pais);
}
public function getFoto(){
	return($this->foto);
}
public function getRol(){
	return($this->rol);
}

public function setNombre()
{
$this->Nombre=Nombre;	
}
public function setApellido()
{
$this->Apellido=Apellido;	
}
public function setUsername()
{
$this->Username=Username;	
}
public function setPassword()
{
$this->Password=Password;	
}
public function setEmail()
{
$this->Email=Email;	
}
public function setSexo()
{
$this->Sexo=Sexo;	
}
public function setBirthday()
{
$this->Birthday=Birthday;	
}
public function setCiudad()
{
$this->Ciudad=Ciudad;	
}
public function setPais()
{
$this->Pais=Pais;	
}
public function setFoto()
{
$this->Foto=Foto;	
}
public function setRol()
{
$this->Rol=Rol;	
}

}
?>