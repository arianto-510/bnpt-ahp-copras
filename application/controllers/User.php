<?php
defined('BASEPATH') OR exit('No direc access allowed');

class User extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');

    // //     // function login nanti disini
    }

    public function index(){
        $data['petugas'] = $this->m_data->get_data('petugas')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_user',$data);
        $this->load->view('dashboard/v_footer');
    }

        // tambah data kriteria
        public function tambah_petugas(){
            $this->load->model('m_data');
            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('username','Username','required');

            if($this->form_validation->run() != false){
                $nama       = $this->input->post('nama');
                $username   = $this->input->post('username');

                $data2 = $this->db->query("SELECT * FROM petugas WHERE username = '$username'")->num_rows();
                if($data2 > 0){
                    redirect(base_url().'user?alert=sudah_ada');
                    return;
                }

                $data = array(
                    'nama'      => $nama,
                    'username'  => $username,
                    'password'  => 'admin12345',
                    'status'    => '1'
                );
                $this->m_data->insert_data($data,'petugas');
                redirect(base_url().'user?alert=tambah');

            }else{
                $this->load->model('m_data');
                $data['petugas'] = $this->db->query("SELECT * FROM petugas")->result();

                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_data_kriteria',$data);
                $this->load->view('dashboard/v_footer');
            }
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
            $id = $this->input->post('id_petugas');
            $username_lama = $this->input->post('username_lama');
            $username = $this->input->post('username');
            $table = 'petugas'; // Tentukan nama tabel di sini atau buat dinamis
            $id_field = 'id_petugas'; // Tentukan nama field id di sini atau buat dinamis

            if($username_lama != $username){
                $cek = $this->db->query("SELECT * FROM petugas WHERE username = '$username'")->num_rows();
                if($cek > 0){
                    redirect(base_url().'user?alert=username');
                    return;
                }
            }

            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username')
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