<?php
include_once("Conexion.php");

class CRUDpersona
{
	var $Sql,$Mensaje,$Persona,$Conex;

	public function __construct()	{
		$this->Sql="";	
		$this->Persona=$Persona;
		$this->Conex= new Conexion();
		$this->Mensaje=$this->Conex->conectar();
	}


	public function ingresar(){
		if($this->Mensaje=="Exito"){
		$this->Sql="INSERT INTO cliente VALUES('".$this->Persona->getCedula()."','".$this->Persona->getNombre()."','".$this->Persona->getApellido()."'
		                                      ,'".$this->Persona->getUsername()."','".$this->Persona->getPassword()."','".$this->Persona->getSexo()."'
		                                      ,'".$this->Persona->getBirthday()."','".$this->Persona->getCiudad()."','".$this->Persona->getPais()."'
		                                      ,'".$this->Persona->getFoto()."','".$this->Persona->getEmail()."');";
		pg_exec($this->Conex->getConexion(),$this->Sql);
		}
	}

	public function consultar(){
		if($this->Persona->getCedula()!="")	
		$this->Sql="SELECT cedula,nombre,apellido,username, sexo, birthday, ciudad, pais, foto, email FROM cliente WHERE cedula= '".$this->Persona->getCedula()."';";
		else
		$this->Sql="SELECT cedula,nombre,apellido,username, sexo, birthday, ciudad, pais, foto, email FROM cliente ORDER BY apellido asc";
		$Registros=pg_exec($this->Conex->getConexion(),$this->Sql);
		return($Registros);
	}

	public function eliminar(){
		$this->Sql="DELETE FROM cliente WHERE cedula= '".$this->Persona->getCedula()."';";
		pg_exec($this->Conex->getConexion(),$this->Sql);
	}

	public function modificar($Persb){
		$this->Sql="UPDATE cliente SET cedula = '".$this->Persona->getCedula()."', nombre='".$this->Persona->getNombre()."', apellido ='".$this->Persona->getApellido()."' , username = '".$this->Persona->getUsername()."', password1 ='".$this->Persona->getPassword()."',sexo='".$this->Persona->getSexo()."',birthday = '".$this->Persona->getBirthday()."',ciudad='".$this->Persona->getCiudad()."', pais='".$this->Persona->getPais()."',foto='".$this->Persona->getFoto()."' WHERE cedula ='".$Persb->getCedula()."';";
		$Registros=pg_exec($this->Conex->getConexion(),$this->Sql);		
	}

	public function getM(){
		return($this->Mensaje);
	}

	public function iniciarSesion(){

	}
	
}
?>