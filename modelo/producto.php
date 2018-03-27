<?php

class Producto{

    private $codigo;
	private $nombre;
	private $marca;
	private $precio;
	private $imagen;

	public function __construct($codigo, $nombre,$marca,$precio, $imagen){
		$this->codigo = $codigo;
		$this->nombre = $nombre;
		$this->marca = $marca;
        $this->precio = $precio;
        $this->imagen = $imagen;
	}

	public function getCodigo(){
		return($this->codigo);
    }
    
    public function getNombre(){
		return($this->nombre);
	}

	public function getMarca(){
		return($this->marca);
	}

	public function getPrecio(){
		return($this->precio);
	}

	public function getImagen(){
		return($this->imagen);
	}
    
    public function setCodigo(){
		$this->codigo=codigo;
	}

	public function setNombre(){
		$this->Nombre=Nombre;
	}

	public function setMarca(){
		$this->marca=marca;
	}

	public function setPrecio(){
		$this->precio=precio;
    }
    
    public function setImagen(){
		$this->imagen=imagen;
	}

}
?>