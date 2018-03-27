<?php

include_once("conexion.php");

class CRUDproducto{
	var $sql, $mensaje, $conexion;

	public function __construct(){
		$this->conexion = new Conexion();
		$this->conexion->conectar();
        $this->sql = "";
        
	}

	public function registrar($producto, $username){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into productos values('".$producto->getCodigo()."', '".$producto->getNombre()."', '".$producto->getMarca()."', '".$producto->getPrecio()."', '".$producto->getImagen()."', '".$username."')";
			pg_query($this->conexion->getConexion(), $this->sql);
		}
	}

	public function getM(){
        return ($this->conexion->getMensaje());
    }

    
}

?>