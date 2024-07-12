<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AhpCoprasModel extends CI_Model
{
    public function get_criteria()
    {
        return $this->db->get('criteria')->result();
    }

    public function get_alternatives()
    {
        return $this->db->get('alternatives')->result();
    }

    public function get_evaluation()
    {
        return $this->db->get('evaluation')->result();
    }
}
