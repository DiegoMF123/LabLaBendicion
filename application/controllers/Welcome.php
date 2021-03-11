<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class Welcome extends CI_Controller {

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
							// cargamos la vista principal que se manda a llamar despues de haberse logeado
							$this->load->view('admin/principal');
							break;
						case '2':
							$this->load->view('operador/principal');
						 break;
						case '3':
							$this->load->view('centralizador/principal');
							break;
						case '4':
								$this->load->view('usuario/principal');
								break;
						case '5':

						$this->load->view('receptor/principal');

							break;
						default:
						// si se ingresa un rol no creado, no mostrara pantalla principal
						 $redirect = base_url()."/index.php/welcome/login";
							// code...
							redirect('/login');
							break;

					}


    }else {
			// Si no se cumple, seguirá mostrando el login
      header("Location: http://192.168.0.4:8888/LabLaBendicion/");
      die();
    }

	}

// Función login, donde llamamos la vista, y las validaciones respectivas para poder acceder al sistema
	public function login(){
		$this->load->helper('url');
		// cargamos estas dos variables, user y pass, los request vienen de los name del formulario del login para que estas variables puedan mandarlas al modelo donde haran la petición de los datos
		// para poder logears
	$user = trim($_REQUEST["Usuario"]);
	$pass = trim($_REQUEST["Password"]);

		if (isset($user) and isset($pas)) {
			echo "Ingrese Usuario y contraseña";
			// code...
		}	else {
			// Cargamos el modelo que vamos a utilziar para que pueda evaluar los datos
			$this->load->model('model_login');
			    // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
			$this->load->library('session');
			// La varaible data trae la variable usuarios y cargamos el modelo y la función de ese modelo y le mandamos
			// las variables con los varlos que tomaron
			$data["usuarios"]= $this->model_login->login($user,$pass);
			// mandamos los datos de la variable data
			var_dump($data["usuarios"]);


			$data["usuarios"]= $this->model_login->login($user,$pass);

			// Ejecutamos un foreach  mandamos la variable data, y si se ejecuta bien tenemos un if
			// mandamos las variables de usuiario y password y las evaluamos, y lo que le estamos diciendo
			// es que si los datos del formulario del login, son iguales a las que estan guardadas en la base de datos
			//mostrará la pantalla principal
				foreach ($data["usuarios"] as $usu) {

						if (($usu->Usuario == $user) and ($usu->Password == $pass)) {
							// code...
							$newdata = array(
											'nombre'  => $usu->Nombre,
											'Dpi' => $usu->Dpi,
							        'username'  => $usu->Usuario,
											'role' => $usu->idTipo_Usuariofk
							);
							$this->session->set_userdata($newdata);
							// Si se cumple el logeo y si existen el usuario y la contraseña, redireccionará a esta url
							header("Location: http://192.168.0.4:8888/LabLaBendicion/index.php/welcome");
							die();

						}else {
							echo "No puedes entrar";
						}
				}
			// code...
		}

// si no se ejecuta, mostrará el login
			$this->load->view('login');


	}

	public function salir(){
		$this->load->helper('url');
	$this->load->library('session');
	echo "saliendo...";
	// Cerramos la sesión
	session_destroy();
	// Nos redireccionará al login
	header("Location: http://192.168.0.4:8888/LabLaBendicion/");
	die();
	}



				public function operador(){
					$this->load->helper('url');
					$this->load->library('session');
					$this->load->model("model_pda");

					$rol= $_SESSION["role"];

					switch ($rol) {
						case '1':


							$this->load->view('operador/vstprin');



							break;
						case '2':

						$this->load->view('operador/vstprin');

							break;
						case '3':

				redirect('restrinct');

							break;
						case '4':

				redirect('restrinct');
							break;
							case '5':

								redirect('restrinct');
								break;

						default:
						redirect('restrinct');
							break;
				}



			}

				public function receptor(){
					$this->load->helper('url');
					$this->load->library('session');
					$this->load->model("model_pda");

						$rol= $_SESSION["role"];
										switch ($rol) {
											case '1':

											$this->load->view('receptor/vstprin');

												break;
											case '2':

												redirect('restrinct');
												break;
											case '3':

									redirect('restrinct');

												break;
											case '4':

									redirect('restrinct');
												break;
												case '5':


													$this->load->view('receptor/vstprin');

													break;

											default:
											redirect('restrinct');
												break;
									}

				}

				public function centralizador(){

					$this->load->helper('url');
					$this->load->library('session');
					$this->load->model("model_pda");

						$rol= $_SESSION["role"];
										switch ($rol) {
											case '1':

											$this->load->view('centralizador/vstprin');

												break;
											case '2':

												redirect('restrinct');
												break;
											case '3':

										$this->load->view('centralizador/vstprin');

												break;
											case '4':

									redirect('restrinct');
												break;
												case '5':

												redirect('restrinct');
													break;

											default:
											redirect('restrinct');
												break;
									}

				}

				public function usuario(){

					$this->load->helper('url');
					$this->load->library('session');
					$this->load->model("model_pda");

						$rol= $_SESSION["role"];
										switch ($rol) {
											case '1':

											$this->load->view('usuario/vstprin');

												break;
											case '2':

												redirect('restrinct');
												break;
											case '3':
											redirect('restrinct');

												break;
											case '4':
											$this->load->view('usuario/vstprin');

												break;
												case '5':

												redirect('restrinct');
													break;

											default:
											redirect('restrinct');
												break;
									}

				}


// Tenemos la función admin, donde mostramos los datos, que este caso es el listado de puntos de atención

				public function admin(){
					    // Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
					$this->load->helper('url');
					  // Tenemos esta libreria session para poder mantener cierto tiempo la session abierta
					$this->load->library('session');
					// Cargamos el modelo que vamos a utilizar para esta función nuevo
					$this->load->model("model_pda");
					// Esta varaible rol, almacena el tipo de rol que se va a estar logeando en el switch con los cases, dependiendo el rol,
					// mostrará las vistas respectivas
					$rol= $_SESSION["role"];


					switch ($rol) {
						case '1':

						if (empty($_REQUEST["region"])) {
												// code...
												// esta varaible data tambien trae la variable datos del foreach de la vista admin, para que muestre los datos
												// que tiene segun el id seleccionado, cargamos el modelo y la función donde mandamos a llamar los datos y
												// le cargamos la variable id para que muestre los datos segun el id seleccionado
												$data["datos"]= $this->model_pda->listado();
												//la variable data va a traer los de la base de datos y los va a mostrar en "tiporegion" y luego cargamos el modelo respectivo
												// con la función donde se encuentra la consulta en donde llamaremos los datos.
												$data["tiporegion"]= $this->model_pda->tipo_region();
												$data["estado"]= $this->model_pda->estado($id);
												  // Esta variable data tambien se declara para poder hacer llamar la variable response que se encuentre en la vista de nuevopda.
												$data["response"]=trim(isset($_REQUEST["response"]));
												        // Cargamos la vista y mandamos la variable data para que pueda cargar las peticiones que queremos que nos muestre
												$this->load->view('admin/admin',$data);


											}else{
												// tenemos otro if para poder realizar una busqueda, segun esa vista
												if (isset($_REQUEST["region"])) {
													// esta variable codigo la llenamos con el valor del name que toma cuando se elige una region de la vista admin y
													// mandamos el id
													$codigo = $_REQUEST["region"];
													// esta varia data muestra los datos del foreach que esta en la vista admin
													// y mostrará los datos segun el id de la región y solo esos mostrara
													$data["datos"] =$this->model_pda->buscar($codigo);
													$data["response"]=trim(isset($_REQUEST["response"]));
													$data["tiporegion"]= $this->model_pda->tipo_region();
														$data["estado"]= $this->model_pda->estado($id);
													$this->load->view('admin/admin',$data);
													// code...
												}else{
													// si no se ejecuta nada, se queda normal
													$data["datos"]= $this->model_pda->listado();
														$data["estado"]= $this->model_pda->estado($id);
													$data["tiporegion"]= $this->model_pda->tipo_region();
														$data["response"]=trim(isset($_REQUEST["response"]));
														$this->load->view('admin/admin',$data);
												}
											}

							break;
						case '2':

							redirect('restrinct');
							break;
						case '3':

				redirect('restrinct');

							break;
						case '4':

				redirect('restrinct');
							break;
							case '5':

								redirect('restrinct');
								break;

						default:
						redirect('restrinct');
							break;
				}






				}




}
