<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {
	 
	public function __construct() {
        parent::__construct();

        $this->load->model('Inicio_model', 'inicio_model');
    }  
	 
	 // MUESTRA LA PANTALLA DE INICIO DE SESION
	public function index()
	{
		$data = array("title" => "Evaluacion");
		$this->load->view('inicio', $data);
                
		
	}
	
	// EJECUTA LA ACCIÓN PARA EL INICIO DE SESION Y DEVUELVE EL RESULTADO
	
	public function ini_ses()
	{
		$res = $this->inicio_model->ini_ses();
                
		echo $res;
	}
	
	public function ses_out(){
		$this->session->sess_destroy();
	}
}
