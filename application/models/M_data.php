<?php 
    class M_data extends CI_Model{

        function cek_login($table,$where){
            return $this->db->get_where($table,$where);
        }
    }

?>