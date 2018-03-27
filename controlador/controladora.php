<?php 

include_once("../modelo/usuario.php");
include_once("../modelo/tienda.php");
include_once("../modelo/CRUDusuario.php");



class Controladora{
	function __construct(){

		$resource = $_SERVER['REQUEST_URI'];

		extract($_REQUEST);

		switch ($method) {
			case 'login':
				$CRUDu = new CRUDusuario();
				$usu = new Usuario("", "", $username, "", "", "", "", "", $pass, "", $rol);
				$registros = $CRUDu->consultar($usu);
				$consulta = pg_fetch_array($registros);
				$filas = pg_numrows($registros);

				if ($filas > 0) {
					if ($consulta['rol'] == "admin") {
						session_start();
					
						$_SESSION['username'] = $username;
						echo json_encode("inicioad");
					}
					
					else if ($consulta['rol'] == "tendero") {
						session_start();
					
						$_SESSION['username'] = $username;
						echo json_encode("inicioten");
					}
					
					else{
					session_start();
					
					$_SESSION['username'] = $username;

					echo json_encode("inicio");
					}
				}
				else{
					echo json_encode("fallo");
				}
				break;

			case 'validar':
				session_start();
				if (isset($_SESSION['username'])) {

					$CRUDu = new CRUDusuario();
					$usu = new Usuario("", "", $_SESSION['username'], "", "", "", "", "", "", "", "");
					$registros = $CRUDu->consultarValidar($usu);
					$consulta = pg_fetch_array($registros);
					$filas = pg_numrows($registros);

					$_SESSION['nombre'] = $consulta["nombres"];
					$_SESSION['apellido'] = $consulta["apellidos"];
					$_SESSION['foto'] = $consulta["foto"];

					for ($i=0; $i < $filas; $i++) { 
						$response = array("Username"=>"".$_SESSION['username'], "Nombre"=>"".$_SESSION['nombre'], "Apellido"=>"".$_SESSION['apellido'], "Foto"=>"".$_SESSION['foto']);
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				else{
					echo json_encode("noExiste");
				}
				break;

				//VALIDAR INDEX---------------------------------

			case 'validarPerfil':
				session_start();
				
				if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				$usu = new Usuario("", "", $_SESSION['username'], "", "", "", "", "", "", "", "");
				$registros = $CRUDu->validarPerfil($usu);
				$consulta = pg_fetch_array($registros);

				$resultado = $consulta["rol"];
				
				if (isset($resultado) == "admin") {
					echo json_encode($resultado);
				}
				else if (isset($resultado) == "tendero") {
					echo json_encode($resultado);
				}
				else if (isset($resultado) == "usuario") {
					echo json_encode($resultado);
				}
			}
				else{
					echo json_encode(false);
				}
				break;


				case 'validarIndex':
				session_start();
				if (isset($_SESSION['username'])) {
					echo json_encode(true);
				}else{
					echo json_encode(false);
				}
				break;

			case 'cerrar':
				session_start();

				$respuesta = session_destroy();
				echo json_encode($respuesta);
				break;

			case 'crearAlbum':
				session_start();
				if (isset($_SESSION['username'])) {
					$user = $_SESSION['username'];
					$CRUDu = new CRUDusuario();
					$respuesta = $CRUDu->crearAlbum($user, $nombreAlbum);
					
					echo json_encode($respuesta);
				}

				break;

			case 'galeria':
				session_start();
				if(isset($_SESSION['username'])){
					$user = $_SESSION['username'];
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->cargarGaleria($user);
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("imagen"=>"".pg_result($registros, $i,0), "lugar"=>"".pg_result($registros, $i,1));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;

				case 'cargarProductos':
				session_start();
				if(isset($_SESSION['username'])){
					$user = $_SESSION['username'];
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->cargarProductos($user);
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("imagen"=>"".pg_result($registros, $i,0), "nombre"=>"".pg_result($registros, $i,1), "precio"=>"".pg_result($registros, $i,2));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;

			case 'galeriaGeneral':
				session_start();
				if(isset($_SESSION['username'])){
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->cargarGaleriaGeneral();
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("imagen"=>"".pg_result($registros, $i,0), "lugar"=>"".pg_result($registros, $i,1));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;

			case 'cargarUsuarios':
				session_start();
				if (isset($_SESSION['username'])) {
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->cargarUsuarios();
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("username"=>"".pg_result($registros, $i,0), "nombres"=>"".pg_result($registros, $i,1), "apellidos"=>"".pg_result($registros, $i,2));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;

			case 'cargarAmigos':
				session_start();
				if (isset($_SESSION['username'])) {
					$user = $_SESSION['username'];
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->cargarAmigos($user);
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("useramigo"=>"".pg_result($registros, $i,0), "nombreamigo"=>"".pg_result($registros, $i,1));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;
			
			//CARGAR TIENDAS ------------------------------------------------------------
			
			case 'cargarTiendas':
			session_start();
			//if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				$registros = $CRUDu->cargarTiendas();
				$filas = pg_numrows($registros);

				for ($i=0; $i < $filas; $i++) { 
					$response = array("nombretienda"=>"".pg_result($registros, $i,0), "tipo"=>"".pg_result($registros, $i,1), "barrio"=>"".pg_result($registros, $i,3), "direccion"=>"".pg_result($registros, $i,4));
					$M[$i] = $response;
				}

				echo json_encode($M);
			
			//}
			break;

			case 'cargarReservas':
				session_start();
				if (isset($_SESSION['username'])) {
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->cargarReservas();
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("nombrehotel"=>"".pg_result($registros, $i,0), "capacidad"=>"".pg_result($registros, $i,1), "tipo"=>"".pg_result($registros, $i,2), "tarifa"=>"".pg_result($registros, $i,3));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;

			case 'reservasPerfil':
				session_start();
				if (isset($_SESSION['username'])) {
					$user = $_SESSION['username'];
					$CRUDu = new CRUDusuario();
					$registros = $CRUDu->reservasPerfil($user);
					$filas = pg_numrows($registros);

					for ($i=0; $i < $filas; $i++) { 
						$response = array("nombrehotel"=>"".pg_result($registros, $i,0), "capacidad"=>"".pg_result($registros, $i,1), "tipo"=>"".pg_result($registros, $i,2), "tarifa"=>"".pg_result($registros, $i,3));
						$M[$i] = $response;
					}
 
					echo json_encode($M);
				}
				break;

			case 'reservar':
				session_start();
				if (isset($_SESSION['username'])) {
					$user = $_SESSION['username'];
					$CRUDu = new CRUDusuario();
					$respuesta = $CRUDu->agregarReserva($user, $hotel, $capacidad, $tipo, $tarifa);
					
					echo json_encode($respuesta);
				}
				break;


			case 'agregarAmigo':
			session_start();
			if (isset($_SESSION['username'])) {
				$user = $_SESSION['username'];
				$CRUDu = new CRUDusuario();
				$respuesta = $CRUDu->agregarAmigo($user, $amigo, $nombreAmigo);
				
				echo json_encode($respuesta);
			}
			break;



			case 'tenderos':
			session_start();
			if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				$registros = $CRUDu->cargarTenderos();
				$filas = pg_numrows($registros);

				for ($i=0; $i < $filas; $i++) { 
					$response = array("username"=>"".pg_result($registros, $i,0));
					$M[$i] = $response;
				}

				echo json_encode($M);
			}
			break;

			case 'cargarUsuarios':
			session_start();
			if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				$registros = $CRUDu->cargarUsuarios();
				$filas = pg_numrows($registros);

				for ($i=0; $i < $filas; $i++) { 
					$response = array("username"=>"".pg_result($registros, $i,0));
					$M[$i] = $response;
				}

				echo json_encode($M);
			}
			break;

			case 'agregarTienda':
			session_start();
			if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				$tienda = new Tienda($nomTienda, $tipo, $dueno, $barrio, $direcc, $tele, $descrip);
				$respuesta = $CRUDu->agregarTienda($tienda);
				
				echo json_encode($respuesta);
			}
			break;

			case 'eliminarTienda':
			session_start();
			if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				//$tienda = new Tienda($nomTienda, $tipo, $dueno, $barrio, $direcc, $tele, $descrip);
				$respuesta = $CRUDu->eliminarTienda($dueno);
				
				echo json_encode($respuesta);
			}
			break;

			case 'eliminarUser':
			session_start();
			if (isset($_SESSION['username'])) {
				$CRUDu = new CRUDusuario();
				//$tienda = new Tienda($nomTienda, $tipo, $dueno, $barrio, $direcc, $tele, $descrip);
				$respuesta = $CRUDu->eliminarUser($user);
				
				echo json_encode($respuesta);
			}
			break;


			default:
				# code...
			break;
		}
	}

}

new Controladora();



?>