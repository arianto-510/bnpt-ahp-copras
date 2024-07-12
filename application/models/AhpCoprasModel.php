<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AhpCoprasModel extends CI_Model
{
    public function get_kriteria()
    {
        return $this->db->get('kriteria')->result();
    }

    public function get_alternatif()
    {
        return $this->db->get('alternatif')->result();
    }

    public function get_penilaian()
    {
        return $this->db->get('penilaian')->result();
    }
}
