<?php

include_once("conexion.php");

class CRUDusuario{
	var $sql, $mensaje, $conexion;

	public function __construct(){
		$this->conexion = new Conexion();
		$this->conexion->conectar();
		$this->sql = "";
	}

	public function registrar($usuario){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into usuarios values('".$usuario->getNombre()."', '".$usuario->getApellido()."', '".$usuario->getUsername()."', '".$usuario->getEmail()."', '".$usuario->getBirthday()."','".$usuario->getSexo()."','".$usuario->getCiudad()."','".$usuario->getPais()."', '".$usuario->getPassword()."','".$usuario->getFoto()."', '".$usuario->getRol()."')";
			pg_query($this->conexion->getConexion(), $this->sql);
		}
	}

	public function consultar($usuario){
		$this->sql = "select * from usuarios where username = '".$usuario->getUsername()."' and contrasena = '".$usuario->getPassword()."' and rol = '".$usuario->getRol()."';";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function consultarValidar($usuario){
		$this->sql = "select * from usuarios where username = '".$usuario->getUsername()."';";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function crearAlbum($username, $nombre){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into albums values('".$username."', '".$nombre."')";
			pg_query($this->conexion->getConexion(), $this->sql);
			return("Exito al crear");
		}
	}

	public function subirFoto($imagen){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into imagenes values('".$imagen->getUsername()."','".$imagen->getAlbum()."', '".$imagen->getNombre()."', '".$imagen->getLugar()."', '".$imagen->getLatitud()."', '".$imagen->getLongitud()."','".$imagen->getFoto()."')";
			pg_query($this->conexion->getConexion(), $this->sql);
		}
	}

	//----------------------------- productos----------------------
	public function cargarProductos($usuario){
		$this->sql = "select imagen, nombre, precio from productos;";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function cargarGaleriaGeneral(){
		$this->sql = "select imagen, lugarfoto from imagenes;";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function cargarUsuarios(){
		$this->sql = "select username, nombres, apellidos from usuarios;";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function cargarTenderos(){
		$this->sql = "select username from usuarios where rol = 'tendero';";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	/*
	public function cargarUsuarios(){
		$this->sql = "select username from usuarios;";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}
	*/

	public function agregarAmigo($user, $amigo, $nombreAmigo){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into amigos values('".$user."','".$amigo."', '".$nombreAmigo."')";
			pg_query($this->conexion->getConexion(), $this->sql);
			return("Amigo agregado con éxito");
		}
	}

	public function cargarAmigos($usuario){
		$this->sql = "select useramigo, nombreamigo from amigos where username = '".$usuario."';";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function cargarReservas(){
		$this->sql = "select * from habitaciones;";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function reservasPerfil($user){
		$this->sql = "select hotel, capacidad, tipo, tarifa from reservas where username = '".$user."';";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function agregarReserva($user, $hotel, $capacidad, $tipo, $tarifa){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into reservas values('".$user."','".$hotel."', '".$capacidad."', '".$tipo."', '".$tarifa."')";
			pg_query($this->conexion->getConexion(), $this->sql);
			return("Reserva agregada con éxito");
		}
	}

	public function agregarTienda($tienda){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "insert into tiendas values('".$tienda->getNombre()."','".$tienda->getTipo()."', '".$tienda->getDueno()."', '".$tienda->getBarrio()."', '".$tienda->getDireccion()."', '".$tienda->getTelefono()."', '".$tienda->getDescripcion()."')";
			pg_query($this->conexion->getConexion(), $this->sql);
			
		}
	}

	public function eliminarTienda($dueno){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "delete from tiendas where dueno =  '".$dueno."';";
			pg_query($this->conexion->getConexion(), $this->sql);
			
		}
	}

	public function eliminarUser($user){
		if ($this->conexion->getMensaje() == "Exito") {
			$this->sql = "delete from usuarios where username =  '".$user."';";
			pg_query($this->conexion->getConexion(), $this->sql);
			
		}
	}

	public function cargarTiendas(){
		$this->sql = "select * from tiendas;";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function validarPerfil($usuario){
		$this->sql = "select rol from usuarios where username = '".$usuario->getUsername()."';";
		$registros = pg_query($this->conexion->getConexion(), $this->sql);
		return($registros);
	}

	public function getM(){
        return ($this->conexion->getMensaje());
    }
}

?>