<?php

class Imagen{

	private $username, $album, $nombre, $lugar, $latitud, $longitud, $foto;

	public function __construct($username, $album, $nombre, $lugar, $latitud, $longitud, $foto){
		$this->username = $username;
		$this->album = $album;
		$this->nombre = $nombre;
		$this->lugar = $lugar;
		$this->latitud = $latitud;
		$this->longitud = $longitud;
		$this->foto = $foto;
	}

	public function getUsername(){
		return($this->username);
	}

	public function getAlbum(){
		return($this->album);
	}

	public function getNombre(){
		return($this->nombre);
	}

	public function getLugar(){
		return($this->lugar);
	}

	public function getLatitud(){
		return($this->latitud);
	}

	public function getLongitud(){
		return($this->longitud);
	}

	public function getFoto(){
		return($this->foto);
	}
}

?>