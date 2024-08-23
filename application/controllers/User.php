<?php
defined('BASEPATH') OR exit('No direc access allowed');

class User extends CI_Controller {
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
        $data['petugas'] = $this->db->query('SELECT * FROM petugas, tbl_desa, tbl_kecamatan WHERE status = "petugas" AND petugas.desa_id = tbl_desa.desa_id AND tbl_desa.kecamatan_id = tbl_kecamatan.kecamatan_id')->result();
        $data['desa'] = $this->db->query('SELECT * FROM tbl_desa, tbl_kecamatan WHERE tbl_desa.kecamatan_id = tbl_kecamatan.kecamatan_id')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_user',$data);
        $this->load->view('dashboard/v_footer');
    }

        // tambah data kriteria
     public function tambah_petugas(){
        
            $nama       = $this->input->post('nama');
            $username   = $this->input->post('username');
            $desa_id    = $this->input->post('desa_id');

            $data2 = $this->db->query("SELECT * FROM petugas WHERE username = '$username'")->num_rows();
            if($data2 > 0){
                redirect(base_url().'user?alert=sudah_ada');
                return;
            }

            $data3 = $this->db->query("SELECT * FROM petugas WHERE desa_id = '$desa_id'")->num_rows();
            if($data3 > 0){
                redirect(base_url().'user?alert=desa_ada');
                return;
            }

            $data = array(
                'nama'      => $nama,
                'username'  => $username,
                'desa_id'   => $desa_id,
                'password'  => 'petugas12345',
                'status'    => 'petugas'
            );
            $this->m_data->insert_data($data,'petugas');
            redirect(base_url().'user?alert=tambah');
    }

        public function get_petugas() {
            $id = $this->input->post('id_petugas');
            $table = 'petugas'; // Tentukan nama tabel di sini atau buat dinamis
            $id_field = 'id_petugas'; // Tentukan nama field id di sini atau buat dinamis
            // var_dump($id,$table,$id_field);
            // die;
            
            log_message('debug', 'ID Petugas: ' . $id); // Log ID yang diterima
        
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

        public function update_petugas() {
            $id             = $this->input->post('id_petugas');
            $username_lama  = $this->input->post('username_lama');
            $username       = $this->input->post('username');
            $desa_id        = $this->input->post('desa_id');
            $id_desaLama    = $this->input->post('desa_lama');

            $table = 'petugas'; // Tentukan nama tabel di sini atau buat dinamis
            $id_field = 'id_petugas'; // Tentukan nama field id di sini atau buat dinamis

            if($username_lama != $username){
                $cek = $this->db->query("SELECT * FROM petugas WHERE username = '$username'")->num_rows();
                if($cek > 0){
                    redirect(base_url().'user?alert=username');
                    return;
                }
            }

            if($desa_id != $id_desaLama){
                $cek = $this->db->query("SELECT * FROM petugas WHERE desa_id = '$desa_id'")->num_rows();
                if($cek > 0){
                    redirect(base_url().'user?alert=desa_ada');
                    return;
                }
            }

            $data = array(
                'nama'      => $this->input->post('nama'),
                'desa_id'   => $desa_id,
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('pass')
            );
            $this->m_data->update_record($table, $id_field, $id, $data);
            redirect(base_url().'user?alert=ubah');
    
        }


        public function petugas_hapus($id){
            $this->load->model('m_data');
            $where = array(
                'id_petugas' => $id
            );
            $this->m_data->delete_data($where,'petugas');
            redirect('user?alert=hapus');
        }
}