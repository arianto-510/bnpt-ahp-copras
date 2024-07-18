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

            // ambil data berdasarkan id
            public function get_record_by_id($table, $id_field, $id) {
                $this->db->where($id_field, $id);
                $query = $this->db->get($table);
                
                // Debugging: Cek apakah query berhasil
                if ($query->num_rows() > 0) {
                    log_message('debug', 'Query berhasil: ' . json_encode($query->row()));
                    return $query->row();
                } else {
                    log_message('debug', 'Query gagal atau data tidak ditemukan');
                    return false;
                }
            }
            
        
            // Generic function to update a record in any table
            public function update_record($table, $id_field, $id, $data) {
                $this->db->where($id_field, $id);
                $this->db->update($table, $data);
            }
    }
?>