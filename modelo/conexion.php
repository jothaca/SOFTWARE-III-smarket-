<?php

class Conexion {
	private $conexion, $mensaje;

	public function __construct(){
		$this->conexion = '';
	}

	public function conectar(){
		$this->mensaje = "Exito";
		$this->conexion = pg_connect("host=localhost port=5432 dbname=smarketDB user=postgres password=andres");

		if (!$this->conexion) {
			$this->mensaje = "Error";
		}
	}

	public function getConexion(){
		return($this->conexion);
	}

	public function getMensaje(){
		return($this->mensaje);
	}

	public function __destruct(){
		$this->conexion;
	}
}

?>
