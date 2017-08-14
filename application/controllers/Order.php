<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Order extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('S_orderpurchase', 'orderP'); //cargamos el modelo S
        $this->load->library('session');
        $this->load->database();
    }


     public function getRelatorio()//Listado Consultores
    {
        $result['success'] = 'error';
        $confir            = $this->orderP->consultores();
        if ($confir) {
            $result['success'] = 'ok';
            $result['consult'] = $this->orderP->getRelatorio();
        }

        echo json_encode($result);
    }
    
       public function getgraficapizza()//Listado Consultores
    {
        $result['success'] = 'error';
        $confir            = $this->orderP->consultores();
        if ($confir) {
            $result['success'] = 'ok';
            $result['grafpizz'] = $this->orderP->getgraficapizza();
        }

        echo json_encode($result);
    }
    
        public function logout_user()//SALIR DEL SISTEMA
    {
        $confir = $this->orderP->logout_user();
        if ($confir) {
            $this->session->sess_destroy();
            redirect("/", 'locations');
        }
    }
    
    

    
}