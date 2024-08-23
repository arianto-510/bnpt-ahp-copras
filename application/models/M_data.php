<?php
class M_data extends CI_Model
{
    function cek_login($table, $where)
    {
        return $this->db->get_where($table, $where);
    }

    function get_data($table)
    {
        return $this->db->get($table);
    }

    // Tambah data
    function insert_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    // Hapus data
    function delete_data($where, $table)
    {
        $this->db->delete($table, $where);
    }

    // ambil data berdasarkan id
    public function get_record_by_id($table, $id_field, $id)
    {
        $this->db->where($id_field, $id);
        $query = $this->db->get($table);

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }

    public function get_kriteria()
    {
        return $this->db->get('kriteria')->result();
    }


    public function update_record($table, $id_field, $id, $data)
    {
        $this->db->where($id_field, $id);
        $this->db->update($table, $data);
    }

    // fungsi untuk mengedit data
function edit_data($where,$table){
    return $this->db->get_where($table,$where);
    }

    function update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
        }

}
