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
                    'username'  => $username
                );
                $this->m_data->insert_data($data,'petugas');
                redirect(base_url().'user');

            }else{
                $this->load->model('m_data');
                $data['petugas'] = $this->db->query("SELECT * FROM petugas")->result();

                $this->load->view('dashboard/v_header');
                $this->load->view('dashboard/v_data_kriteria',$data);
                $this->load->view('dashboard/v_footer');
            }
        }
}