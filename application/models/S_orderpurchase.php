<?php

class S_orderpurchase extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }
    
    
     public function consultores()
    {
        $co_tipo = array('0', '1', '2');
        $parametros = array('perm.co_sistema'=>1, 'perm.in_ativo'=>'s');
        $this->db->select('con.co_usuario, con.no_usuario');
        $this->db->from('cao_usuario as con');
        $this->db->join('permissao_sistema as perm', 'con.co_usuario=perm.co_usuario', 'inner');
        $this->db->where($parametros);
        $this->db->where_in('perm.co_tipo_usuario', $co_tipo);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }
    
    public function getRelatorio()
    {
        $fecha_desde= $this->input->post("datoA");
        $fecha_hasta= $this->input->post("datoB");
        $list= $this->input->post("lista");
        $lista_new = explode("-",$list);

        
        $this->db->select('cu.co_usuario,
                            MONTH(cf.data_emissao) as month,
                            YEAR(cf.data_emissao) as year,
                            DAY(cf.data_emissao) as days,
                            cs.brut_salario as res_salario,
                            sum(cf.valor-((cf.valor*cf.total_imp_inc)/100)) as res_liquida,
                            ((cf.valor-(cf.valor*cf.total_imp_inc/100))*cf.comissao_cn/100) as res_comissao,
                            (sum(cf.valor-((cf.valor*cf.total_imp_inc)/100)) + ((cf.valor-(cf.valor*cf.total_imp_inc/100))*cf.comissao_cn/100)) as lucro
            ');
        $this->db->from('cao_usuario AS cu');
        $this->db->join('cao_os', 'cao_os.co_usuario = cu.co_usuario', 'inner');
        $this->db->join('cao_fatura AS cf', 'cf.co_os = cao_os.co_os', 'inner');
        $this->db->join('cao_salario AS cs', 'cs.co_usuario = cu.co_usuario', 'left');
        $this->db->where("DATE_FORMAT(cf.data_emissao,'%Y-%m-%d') between '$fecha_desde' and '$fecha_hasta'");
        $this->db->where_in('cu.co_usuario', $lista_new);
        $this->db->group_by(' cu.co_usuario,cf.co_os ');
        $this->db->order_by('cu.co_usuario asc,YEAR desc, month asc');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
    
    public function getgraficapizza()
    {
        $fecha_desde= $this->input->post("datoA");
        $fecha_hasta= $this->input->post("datoB");
        $list= $this->input->post("lista");
        $lista_new = explode("-",$list);

        
        $this->db->select('distinct cu.co_usuario, MONTH(cf.data_emissao) as mess');
        $this->db->from('cao_usuario AS cu');
        $this->db->join('cao_os', 'cao_os.co_usuario = cu.co_usuario', 'inner');
        $this->db->join('cao_fatura AS cf', 'cf.co_os = cao_os.co_os', 'inner');
        $this->db->join('cao_salario AS cs', 'cs.co_usuario = cu.co_usuario', 'left');
        $this->db->where("DATE_FORMAT(cf.data_emissao,'%Y-%m-%d') between '$fecha_desde' and '$fecha_hasta'");
        $this->db->where_in('cu.co_usuario', $lista_new);
        $this->db->group_by('cu.co_usuario,MONTH(cf.data_emissao)');
        $this->db->order_by('cu.co_usuario, MONTH(cf.data_emissao)');
        $query = $this->db->get();
        $result = $query->result();

        return $result;
    }
    
    
        public function logout_user()//salir del sistema Usuarios
    {
            $id_user_session=  $this->session->userdata('idUser');

        return TRUE;
    }
    
}

?>