<?php 
    class M_data extends CI_Model{
        // function cek_login($table,$where){
        //     return $this->db->get_where($table,$where);
        // }

        function get_data($table){
            return $this->db->get($table);
        }

        // Tambah data
        function insert_data($data,$table){
            $this->db->insert($table,$data);
            }

        // Hapus data
        function delete_data($where,$table){
            $this->db->delete($table,$where);
            }
    }
?>