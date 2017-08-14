<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('element')) {

    function add_log($id_Usesr, $record_type, $description, $sql = NULL)
    {

        $SL = & get_instance();
        $SL->load->database();

        $data_log['ID_Users']    = $id_Usesr;
        $data_log['record_type'] = $record_type;
        $data_log['description'] = $description;
        $data_log['logs_sql']    = $sql;
        $SL->db->set('logs_datetime', 'NOW()', FALSE);
        return $SL->db->insert('mx_logs', $data_log);
    }
    
    function notifications_messagges()//mostrar lista de Alerts
    {
        $SL = & get_instance();
        $SL->load->database();
        /* $SL->db->select("id, alerts, ticket, alerts_datetime, datediff(minute, alerts_datetime, GETDATE()) as age_last, priority_level", FALSE);
          $data['id_User'] = $SL->session->userdata('idUser');
          $SL->db->order_by("alerts_datetime", "desc");
          $SL->db->limit(4);
          $query           = $SL->db->get_where('S_alerts', $data);
          $result          = $query->result(); */


        $data['iduser']          = $SL->session->userdata('idUser');
        $data['status_views']    = 0;
        $data['id_notification'] = 2;
        $SL->db->select('sa.id,su.Name, su.Surname, sa.alerts, sa.ticket, sa.alerts_datetime, DATEDIFF(sa.alerts_datetime, NOW()) as age_last, sa.priority_level');
        $SL->db->distinct();
        $SL->db->from('mx_alerts as sa');
        $SL->db->join('mx_user_alerts ua', 'sa.id = ua.idalerts');
        $SL->db->join('mx_users su', 'sa.id_User = su.ID_User');
        $SL->db->where($data);
        $SL->db->where($data);
        $SL->db->order_by("sa.alerts_datetime", "desc");
        $SL->db->limit(4);

        $query  = $SL->db->get();
        $result = $query->result();

        return $result;
    }
    
    
    
    function insert_warning_import($resp_1,$resp_2,$resp_3,$arch_name)
    {
        $SL = & get_instance();
        $SL->load->database();
        $nombre_tabla = 'MWT_warning_import';
      
        $datak['nombre_columna'] = $resp_1;
        $datak['dato_columna'] = $resp_2;
        $datak['mensaje'] = $resp_3;
        $datak['nombre_archivo'] = $arch_name;
        $datak['idUser'] = $SL->session->userdata('idUser');
        $SL->db->set('CreatedDate', 'NOW()', FALSE);
        $SL->db->set('LastModDate', 'NOW()', FALSE);

        return $SL->db->insert($nombre_tabla, $datak);

    }
    
   
}
?>
