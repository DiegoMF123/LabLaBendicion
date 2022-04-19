<?php
defined('BASEPATH') or exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class Welcome extends CI_Controller
{

	public function index()
	{
		// Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
		$this->load->helper('url');
		// Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
		$this->load->library('session');
		$usuario = $_SESSION["username"];


		// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
		// mostrará las vistas respectivas.
		$rol = $_SESSION["role"];

		if (isset($usuario)) {

			switch ($rol) {

				case '1':
					$this->load->view('usuario/principal');
					break;

				case '2':
					$this->load->view('accessdenied.php');
					break;

				case '3':
					$this->load->view('accessdenied.php');
					break;

				case '4':
					$this->load->view('accessdenied.php');
					break;

				case '5':
					$this->load->view('accessdenied.php');
					break;

				case '6':
					$this->load->view('accessdenied.php');
					break;

				default:
					// si se ingresa un rol no creado, no mostrara pantalla principal
					$redirect = base_url() . "/index.php/welcome/login";
					// code...
					redirect('/login');
					break;
			}
		} else {
			// Si no se cumple, seguirá mostrando el login
			header("Location: http://192.168.0.7:8888/Consulta_Vuelos/");
			die();
		}
	}

	// Función login, donde llamamos la vista, y las validaciones respectivas para poder acceder al sistema
	public function login()
	{
		$this->load->helper('url');
		// cargamos estas dos variables, user y pass, los request vienen de los name del formulario del login para que estas variables puedan mandarlas al modelo donde haran la petición de los datos
		// para poder logears
		$user = trim($_REQUEST["Usuario"]);
		$pass = trim($_REQUEST["Password"]);

		if (isset($user) and isset($pas)) {
			echo "Ingrese Usuario y contraseña";
			// code...
		} else {
			// Cargamos el modelo que vamos a utilziar para que pueda evaluar los datos
			$this->load->model('model_login');
			// Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
			$this->load->library('session');
			// La varaible data trae la variable usuarios y cargamos el modelo y la función de ese modelo y le mandamos
			// las variables con los varlos que tomaron
			$data["usuarios"] = $this->model_login->login($user, $pass);
			// mandamos los datos de la variable data
			var_dump($data["usuarios"]);


			$data["usuarios"] = $this->model_login->login($user, $pass);

			// Ejecutamos un foreach  mandamos la variable data, y si se ejecuta bien tenemos un if
			// mandamos las variables de usuiario y password y las evaluamos, y lo que le estamos diciendo
			// es que si los datos del formulario del login, son iguales a las que estan guardadas en la base de datos
			//mostrará la pantalla principal
			foreach ($data["usuarios"] as $usu) {

				if (($usu->Usuario == $user) and ($usu->Password == $pass)) {
					// code...
					$newdata = array(
						'idusuario' => $usu->IdUsuarios,
						'nombre'  => $usu->Nombre,
						'username'  => $usu->Usuario,
						'role' => $usu->IdTipoUsuarioRolFK

					);
					$this->session->set_userdata($newdata);
					// Si se cumple el logeo y si existen el usuario y la contraseña, redireccionará a esta url
					header("Location: http://192.168.0.7:8888/Consulta_Vuelos/index.php/welcome");
					die();
				} else {
					echo "No puedes entrar";
				}
			}
			// code...
		}

		// si no se ejecuta, mostrará el login
		$this->load->view('login');
	}


	public function salir()
	{
		$this->load->helper('url');
		$this->load->library('session');
		echo "saliendo...";
		// Cerramos la sesión
		session_destroy();
		// Nos redireccionará al login
		header("Location: http://192.168.0.7:8888/Consulta_Vuelos/");
		die();
	}
}
