<?php

class Inicio_model extends CI_Model {
    
    private static $html = '';

    public function __construct() {
        //parent::__construct();
        $this->load->database();
        $html = '';

    }

	// CONSULTA LOS DATOS DE INICIO DE SESION Y CREA LAS VARIABLES DE SESION DEL SISTEMA
    public function ini_ses(){
		$where = array("Mail" => $this->input->post("email"), 
                               "Password" => md5($this->input->post("password")),
                                "Activo" => "1");
		$res = $this->db->from("cao_users")->where($where)->get();

		$res = $res->result();
		
//		var_dump($res);
//                die();
			if(count($res) > 0){
                                $ID_Users=$res[0]->ID_User;
                                
				$datos = array("ID_User" => $ID_Users,
                                                "Name"  => $res[0]->Name,
                                                "Surname"   => $res[0]->Surname,
                                                "Mail"   => $res[0]->Mail,
                                                "Activo"  => $res[0]->Activo,
                                                "image" => $res[0]->image);

                                //creamos la session del usuario
                                $datos['idUser'] = $ID_Users;
                              
                                $datos_mod = $this->build_menu(0, $ID_Users);
                                
                                $datos["mods"] = $datos_mod;
				
				$this->session->set_userdata($datos);
				return "exito";
			}else if(count($res) == 0){
				return 	"no_existe";
			}else if($res[0]->status == '1'){
				return "bloqueado";	
			}
		
	}
        
        
        
        
    public function build_menu($idfather, $iduser, $nivel = 0)
        {

            $where = array("mod.status" => "0",
                            "mod.type" => "0",
                            "mod.idfather" => $idfather,
                            "mod.visible" => "1");

            $this->db->select("mod.id, mod.name, mod.icon, mod.url, mod.idfather");
            $this->db->from("cao_modules as mod");
            $this->db->join("cao_permits_user as pu", "mod.id = pu.idmodule and pu.iduser = '".$iduser."'", "inner", FALSE);
            $this->db->where($where);
            $get = $this->db->get();
            $result = $get->result();

            if($nivel == 0){
                self::$html .= "<ul id='side-menu' class='nav in'>"
                        . "<li><a href='".base_url()."index.php/dashboard/'><i class='fa fa-home fa-fw'></i> Inicio</a></li>";
            }else{
                $nivel = 0;
               self::$html .= "<ul class='nav nav-second-level'>";
            }
            
            foreach($result as $m){
                if($m->url == ''){
                    $url = "#";
                }else{
                    $url = base_url()."index.php/".$m->url;
                }
                
                self::$html .= "<li><a href='".$url."'>"
                            . "<i class='fa fa-".$m->icon." fa-fw'></i> ".$m->name;
                    
                $where = array("mod.status" => "0",
                                "mod.type" => "0",
                                "mod.idfather" => $m->id);

                $this->db->select("mod.id, mod.name, mod.icon, mod.url, mod.idfather");
                $this->db->from("cao_modules as mod");
                $this->db->join("cao_permits_user as pu", "mod.id = pu.idmodule and pu.iduser = '".$iduser."'", "inner", FALSE);
                $this->db->where($where);
                $get = $this->db->get();
                $sub = $get->result();

                if(count($sub) > 0){
                    self::$html .= "<span class='fa arrow'></span></a>";
                        $this->build_menu($m->id, $iduser, $nivel = 1);
                 }else{
                    self::$html .='</a>';
                 }
                 
                self::$html .= "</li>";
            }
            
            self::$html .= "</ul>";
            return self::$html;

        }


}

?>