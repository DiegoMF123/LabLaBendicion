<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// esta función hace referencia para poder mandar a llamar la vista que
// le queremos mandar.
class Restrinct extends CI_Controller {
	public function index()
	{
		// Hace referencia para que pueda cargar la url que se va a usar en el proyecto, si no, no funciona
    $this->load->helper('url');
		    // Cargamos el modelo que vamos a utilizar para esta función nuevo
    $this->load->library('session');
		// Cargamos la vista que queremos que se muestre cuando se llame o se haga refe a la clase restrinct de nuestro controlador
    $this->load->view('accessdenied.php');
	}
}
