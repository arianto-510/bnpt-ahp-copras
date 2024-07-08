<?php
defined('BASEPATH') OR exit('No direc access allowed');

class Dashboard extends CI_Controller {
    // function __construct()
    // {
    //     parent::__construct();

    // //     // function login nanti disini
    // }

    public function index()
    {
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_index');
        $this->load->view('dashboard/v_footer');
    }

    // BAGIAN DATA ALTERNATIF
    public function data_alternatif()
    {
        $this->load->model('m_data');
        $data['alternatif'] = $this->db->query("SELECT * FROM alternatif WHERE id_alternatif")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_alternatif', $data);
        $this->load->view('dashboard/v_footer');
    }

    // tambah data alternatif
    public function tambah_alternatif()
                {
                    $this->load->model('m_data');

                    $this->form_validation->set_rules('nama','Nama','required');
                    $this->form_validation->set_rules('nik','Nik','required');
                    $this->form_validation->set_rules('telepon','Telepon','required');
                    $this->form_validation->set_rules('jk','Jk','required');
                    $this->form_validation->set_rules('alamat','Alamat','required');
                        if($this->form_validation->run() != false){
                            $nama = $this->input->post('nama');
                            $nik = $this->input->post('nik');
                            $telepon = $this->input->post('telepon');
                            $jk = $this->input->post('jk');
                            $alamat = $this->input->post('alamat');
                            $data = array(
                                'nama' => $nama,
                                'nik' => $nik,
                                'telepon' => $telepon,
                                'jenis_kelamin' => $jk,
                                'alamat' => $alamat
                             );
                            $this->m_data->insert_data($data,'alternatif');
                                redirect(base_url().'dashboard/data_alternatif');
                        }else{
                            $this->load->view('dashboard/v_header');
                            $this->load->view('dashboard/v_data_alternatif');
                            $this->load->view('dashboard/v_footer');
                        }
                }
    
    // hapus data alternatif
    public function alternatif_hapus($id)
                        {
                            $this->load->model('m_data');
                        $where = array(
                        'id_alternatif' => $id
                        );
                        $this->m_data->delete_data($where,'alternatif');
                        
                        }
}