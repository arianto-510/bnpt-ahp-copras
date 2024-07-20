<?php
defined('BASEPATH') OR exit('No direc access allowed');

class Dashboard extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');

        if($this->session->userdata('status')!="telah_login"){
            redirect(base_url().'login?alert=belum_login');
        }
    }

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
                        redirect('dashboard/data_alternatif');
                        }
    // edit alternatif
    public function get_alternatif() {
        $id = $this->input->post('id_alternatif');
        $table = 'alternatif'; // Tentukan nama tabel di sini atau buat dinamis
        $id_field = 'id_alternatif'; // Tentukan nama field id di sini atau buat dinamis
    
        log_message('debug', 'ID Alternatif: ' . $id); // Log ID yang diterima
    
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
    
    
    public function update_alternatif() {
        $id = $this->input->post('id_alternatif');
        $table = 'alternatif'; // Tentukan nama tabel di sini atau buat dinamis
        $id_field = 'id_alternatif'; // Tentukan nama field id di sini atau buat dinamis
        $data = array(
            'nama' => $this->input->post('nama'),
            'nik' => $this->input->post('nik'),
            'telepon' => $this->input->post('telepon'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat' => $this->input->post('alamat')
        );
        $this->m_data->update_record($table, $id_field, $id, $data);
        redirect('dashboard/data_alternatif');

    }

    // DATA KRITERIA
    public function data_kriteria()
    {
        $this->load->model('m_data');
        $data['kriteria'] = $this->db->query("SELECT * FROM kriteria")->result();
        $data['jumlah_kriteria'] = $this->db->query("SELECT * FROM kriteria")->num_rows();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_kriteria', $data);
        $this->load->view('dashboard/v_footer');
    }

    // tambah data kriteria
    public function tambah_kriteria()
                {
                    $this->load->model('m_data');
                    $this->form_validation->set_rules('nama','Nama','required');
                        if($this->form_validation->run() != false){
                            $nama = $this->input->post('nama');
                            $data = array(
                                'nama_kriteria' => $nama
                             );
                            $this->m_data->insert_data($data,'kriteria');
                                redirect(base_url().'dashboard/data_kriteria');
                        }else{
                            $this->load->model('m_data');
                            $data['kriteria'] = $this->db->query("SELECT * FROM kriteria")->result();

                            $this->load->view('dashboard/v_header');
                            $this->load->view('dashboard/v_data_kriteria',$data);
                            $this->load->view('dashboard/v_footer');
                        }
                }

    // hapus kriteria
    public function kriteria_hapus($id)
                        {
                            $this->load->model('m_data');
                        $where = array(
                        'id_kriteria' => $id
                        );
                        $this->m_data->delete_data($where,'kriteria');
                        redirect('dashboard/data_kriteria');
                        }


    // edit kriteria
    public function get_kriteria() {
        $id = $this->input->post('id_kriteria');
        $table = 'kriteria'; // Tentukan nama tabel di sini atau buat dinamis
        $id_field = 'id_kriteria'; // Tentukan nama field id di sini atau buat dinamis
    
        log_message('debug', 'ID Kriteria: ' . $id); // Log ID yang diterima
    
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
    
    
    public function update_kriteria() {
        $id = $this->input->post('id_kriteria');
        $table = 'kriteria'; // Tentukan nama tabel di sini atau buat dinamis
        $id_field = 'id_kriteria'; // Tentukan nama field id di sini atau buat dinamis
        $data = array(
            'nama_kriteria' => $this->input->post('nama'),
        );
        $this->m_data->update_record($table, $id_field, $id, $data);
        redirect('dashboard/data_kriteria');

    }
    
    
    
    // DATA PENILAIAN
    public function data_penilaian()
    {
        $this->load->model('m_data');
        $data['penilaian'] = $this->db->query("
            SELECT p.id_penilaian, a.nik, a.nama, a.alamat, k.nilai
            FROM penilaian p
            JOIN alternatif a ON p.id_alternatif = a.id_alternatif
            JOIN kriteria k ON p.id_kriteria = k.id_kriteria
        ")->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_penilaian', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function logout(){
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }
}