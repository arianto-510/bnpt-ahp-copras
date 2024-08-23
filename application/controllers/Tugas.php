<?php
defined('BASEPATH') OR exit('No direc access allowed');

class Tugas extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
        $this->load->model('m_data');
    }

    public function index(){
        $data['kecamatan'] = $this->m_data->get_data('tbl_kecamatan')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_kecamatan',$data);
        $this->load->view('dashboard/v_footer');
    }

    public function tambah_kec(){
        $kecamatan        = $this->input->post('kecamatan');

        $where = array(
            'slug_kec'  => Strtr($kecamatan, ' ', '-')
        );
        $cek   = $this->m_data->edit_data($where,'tbl_kecamatan')->num_rows();
        if($cek > 0){
            redirect(base_url().'tugas?alert=sudah_ada');
            return;
        }
        
        $data   = array(
            'kecamatan'         => $kecamatan,
            'slug_kec'    => Strtr($kecamatan, ' ', '-')
        );

        $this->m_data->insert_data($data,'tbl_kecamatan');
        redirect(base_url().'tugas?alert=tambah');
    }

    public function get_kec() {
        $id = $this->input->post('kecamatan_id');
        $table = 'tbl_kecamatan'; // Tentukan nama tabel di sini atau buat dinamis
        $id_field = 'kecamatan_id'; // Tentukan nama field id di sini atau buat dinamis
        // var_dump($id,$table,$id_field);
        // die;
        
        log_message('debug', 'ID Kecamatan: ' . $id); // Log ID yang diterima
    
        $data = $this->m_data->get_record_by_id($table, $id_field, $id);
        
        
        // Debugging: Cek apakah data ditemukan
        if ($data) {
            log_message('debug', 'Data ditemukan: ' . json_encode($data));
            echo json_encode($data);
        } else {
            log_message('debug', 'Data tidak ditemukan');
            echo json_encode(array('error' => 'Data tidak ditemukan'));
        }
    }

    public function update_kec() {
        $id         = $this->input->post('kecamatan_id');
        $slug_kec   = $this->input->post('slug_kec');
        $kec        = $this->input->post('kec');
        $kec_lama   = $this->input->post('kec_lama');

        $where = array(
            'slug_kec'  => Strtr($kec, ' ', '-')
        );

        if($kec != $kec_lama){
            $cek = $this->m_data->edit_data($where,'tbl_kecamatan')->num_rows();
            if($cek > 0){
                redirect(base_url().'tugas?alert=sudah_ada');
                return;
            }
        }
        
        $where  = array(
            'kecamatan_id'   => $id
        );

        $data   = array(
            'kecamatan'      => $kec,
            'slug_kec' => Strtr($kec, ' ', '-')
        );
        $this->m_data->update_data($where,$data,'tbl_kecamatan');
        redirect(base_url().'tugas?alert=update');
    }

    public function kec_hapus($id){
        $where  = array(
            'kecamatan_id'   => $id
        );
        $this->m_data->delete_data($where,'tbl_kecamatan');
        redirect(base_url().'tugas?alert=hapus');
    }

    public function desa(){
        $data['desa']       = $this->db->query("SELECT * FROM tbl_desa, tbl_kecamatan WHERE tbl_desa.kecamatan_id = tbl_kecamatan.kecamatan_id")->result();
        $data['kecamatan']  = $this->m_data->get_data('tbl_kecamatan')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_desa',$data);
        $this->load->view('dashboard/v_footer');
    }

    public function tambah_desa(){
        $desa        = $this->input->post('desa');
        $kec_id      = $this->input->post('kecamatan');

        $where = array(
            'desa'          => $desa,
            'kecamatan_id'   => $kec_id
        );
        $cek   = $this->m_data->edit_data($where,'tbl_desa')->num_rows();
        if($cek > 0){
            redirect(base_url().'tugas/desa?alert=sudah_ada');
            return;
        }
        
        $data   = array(
            'desa'          => $desa,
            'kecamatan_id'  => $kec_id
        );
        $this->m_data->insert_data($data,'tbl_desa');
        redirect(base_url().'tugas/desa?alert=tambah');
    }

    public function get_desa() {
        $id = $this->input->post('desa_id');
        // $table = 'tbl_desa'; // Tentukan nama tabel di sini atau buat dinamis
        // $id_field = 'desa_id'; // Tentukan nama field id di sini atau buat dinamis
        
        // log_message('debug', 'ID desa: ' . $id); // Log ID yang diterima
    
        // $data = $this->m_data->get_record_by_id($table, $id_field, $id);
        $data   = $this->db->query("SELECT * FROM tbl_desa, tbl_kecamatan WHERE tbl_desa.kecamatan_id = tbl_kecamatan.kecamatan_id AND tbl_desa.desa_id = '$id'")->row();
        
        // Debugging: Cek apakah data ditemukan
        if ($data) {
            log_message('debug', 'Data ditemukan: ' . json_encode($data));
            echo json_encode($data);
        } else {
            log_message('debug', 'Data tidak ditemukan');
            echo json_encode(array('error' => 'Data tidak ditemukan'));
        }
    }


    public function update_desa() {
        $id         = $this->input->post('desa_id');
        $desa       = $this->input->post('desa');
        $desa_lama  = $this->input->post('desa_lama');
        $kec_id     = $this->input->post('kecamatan');
        $kec_idLama = $this->input->post('idKec_lama');

        $where = array(
            'desa'          => $desa,
            'kecamatan_id'  => $kec_id
        );

        if($desa != $desa_lama){
            $cek   = $this->m_data->edit_data($where,'tbl_desa')->num_rows();
            if($cek > 0){
                redirect(base_url().'tugas/desa?alert=sudah_ada');
                return;
            }
        }

        if($kec_id != $kec_idLama){
            $cek   = $this->m_data->edit_data($where,'tbl_desa')->num_rows();
            if($cek > 0){
                redirect(base_url().'tugas/desa?alert=sudah_ada2');
                return;
            }
        }

        $where = array(
            'desa_id'   => $id
        );

        $data   = array(
            'desa'          => $desa,
            'kecamatan_id'  => $kec_id
        );
        $this->m_data->update_data($where,$data,'tbl_desa');
        redirect(base_url().'tugas/desa?alert=ubah');
    }

    public function desa_hapus($id){
        $where  = array(
            'desa_id'   => $id
        );
        $this->m_data->delete_data($where,'tbl_desa');
        redirect(base_url().'tugas/desa?alert=hapus');
    }

}