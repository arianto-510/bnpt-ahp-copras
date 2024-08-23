<?php
defined('BASEPATH') or exit('No direc access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');

        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . 'login?alert=belum_login');
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
        $id_petugas         = $_SESSION['id'];
        
        if($_SESSION['level'] == 'petugas'){
            $data['alternatif'] = $this->db->query("SELECT * FROM alternatif, petugas WHERE alternatif.id_petugas = petugas.id_petugas AND petugas.id_petugas = '$id_petugas' ORDER BY alternatif.id_alternatif")->result();
        }else{
            $data['alternatif'] = $this->db->query("SELECT * FROM alternatif, petugas WHERE alternatif.id_petugas = petugas.id_petugas")->result();
            $data['desa'] = $this->db->query("SELECT * FROM petugas, tbl_desa, tbl_kecamatan WHERE petugas.status = 'petugas' AND petugas.desa_id = tbl_desa.desa_id AND tbl_desa.kecamatan_id = tbl_kecamatan.kecamatan_id")->result();
        }
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_alternatif', $data);
        $this->load->view('dashboard/v_footer');
    }

    // tambah data alternatif
    public function tambah_alternatif()
    {
        $this->load->model('m_data');

            $nama       = $this->input->post('nama');
            $nik        = $this->input->post('nik');
            $telepon    = $this->input->post('telepon');
            $jk         = $this->input->post('jk');
            $alamat     = $this->input->post('alamat');
            $id_petugas = $_SESSION['id'];
            
            $level  = $_SESSION['level'];
            if($level = 'admin'){
                $id_petugas = $this->input->post('id_petugas');
            }

            $data = array(
                'nama_warga'    => $nama,
                'nik'           => $nik,
                'telepon'       => $telepon,
                'jenis_kelamin' => $jk,
                'alamat'        => $alamat,
                'id_petugas'    => $id_petugas
            );
            $this->m_data->insert_data($data, 'alternatif');
            redirect(base_url() . 'dashboard/data_alternatif');
    }

    // hapus data alternatif
    public function alternatif_hapus($id)
    {
        $this->load->model('m_data');
        $where = array(
            'id_alternatif' => $id
        );
        $this->m_data->delete_data($where, 'alternatif');
        $this->m_data->delete_data($where, 'perhitungan');
        redirect('dashboard/data_alternatif');
    }
    // edit alternatif
    public function get_alternatif()
    {
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


    public function update_alternatif()
    {
        $id         = $this->input->post('id_alternatif');
        $id_petugas = $_SESSION['id'];

        $level  = $_SESSION['level'];
        if($level = 'admin'){
            $id_petugas = $this->input->post('id_petugas');
        }
        
        $where  = array(
            'id_alternatif' => $id
        );
        $data = array(
            'nama_warga'    => $this->input->post('nama'),
            'nik'           => $this->input->post('nik'),
            'telepon'       => $this->input->post('telepon'),
            'jenis_kelamin' => $this->input->post('jk'),
            'alamat'        => $this->input->post('alamat'),
            'id_petugas'    => $id_petugas
        );

        $this->m_data->update_data($where, $data, 'alternatif');
        redirect('dashboard/data_alternatif');
    }

    // DATA KRITERIA
    public function data_kriteria()
    {
        $this->load->model('m_data');
        $matriks = $this->db->query("SELECT * FROM matrix");
        $arr = [];
        $baris = 0;
        $matrix = $matriks->result();

        foreach ($matrix as $m) {
            $arr[$baris][0] = $m->pendapatan;
            $arr[$baris][1] = $m->tanggungan;
            $arr[$baris][2] = $m->pendidikan;
            $arr[$baris][3] = $m->pekerjaan;
            $baris++;
        }

        $data['arr'] = $arr;
        $data['matrix'] = $matrix;

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
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $data = array(
                'nama_kriteria' => $nama
            );
            $this->m_data->insert_data($data, 'kriteria');
            redirect(base_url() . 'dashboard/data_kriteria');
        } else {
            $this->load->model('m_data');
            $data['kriteria'] = $this->db->query("SELECT * FROM kriteria")->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_data_kriteria', $data);
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
        $this->m_data->delete_data($where, 'kriteria');
        redirect('dashboard/data_kriteria');
    }


    // edit kriteria
    public function get_kriteria()
    {
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


    public function update_kriteria()
    {
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

        // Mengambil data dari tabel alternatif
        
        // Mengambil data dari tabel perhitungan dan join dengan tabel alternatif
        // $data['perhitungan'] = $this->db->query("
        //     SELECT a.nama_warga, p.pendapatan, p.j_tanggungan, p.pendidikan, p.pekerjaan, a.id_alternatif, p.id
        //     FROM alternatif a
        //     JOIN perhitungan p ON a.id_alternatif = p.id_alternatif
        // ")->result();
        
        $level = $_SESSION['level'];
        if($level == 'petugas') {
            $id_petugas = $_SESSION['id'];
            $data['alternatif'] = $this->db->query("SELECT * FROM alternatif, petugas WHERE alternatif.id_petugas = petugas.id_petugas AND petugas.id_petugas = '$id_petugas' ORDER BY alternatif.id_alternatif")->result();
            $data['perhitungan'] = $this->db->query("SELECT * FROM alternatif, petugas, perhitungan WHERE alternatif.id_petugas = petugas.id_petugas AND petugas.id_petugas = '$id_petugas' AND alternatif.id_alternatif = perhitungan.id_alternatif")->result();
        }else{
            $data['alternatif'] = $this->db->query("SELECT * FROM alternatif ORDER BY id_alternatif")->result();
            $data['perhitungan'] = $this->db->query("SELECT * FROM alternatif, perhitungan WHERE alternatif.id_alternatif = perhitungan.id_alternatif")->result();
        }
        // Load views
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_penilaian', $data);
        $this->load->view('dashboard/v_footer');
    }

    public function tambah_penilaian()
    {
        $this->load->model('m_data');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        if ($this->form_validation->run() != false) {
            $nama = $this->input->post('nama');
            $pendapatan = $this->input->post('pendapatan');
            $tanggungan = $this->input->post('tanggungan');
            $pendidikan = $this->input->post('pendidikan');
            $pekerjaan = $this->input->post('pekerjaan');

            $where  = array(
                'id_alternatif' => $nama
            );

            $cek    = $this->m_data->edit_data($where, 'perhitungan')->num_rows();
            if($cek > 0){
                redirect(base_url() . 'dashboard/data_penilaian');
            }
            $data = array(
                'id_alternatif' => $nama,
                'pendapatan' => $pendapatan,
                'j_tanggungan' => $tanggungan,
                'pendidikan' => $pendidikan,
                'pekerjaan' => $pekerjaan,
            );
            $this->m_data->insert_data($data, 'perhitungan');
            redirect(base_url() . 'dashboard/data_penilaian');

        } else {
            $this->load->model('m_data');
            $data['perhitungan'] = $this->db->query("SELECT * FROM perhitungan")->result();

            $this->load->view('dashboard/v_header');
            $this->load->view('dashboard/v_data_penilaian', $data);
            $this->load->view('dashboard/v_footer');
        }
    }

    public function perhitungan_hapus($id)
    {
        $this->load->model('m_data');
        $where = array(
            'id' => $id
        );
        $this->m_data->delete_data($where, 'perhitungan');
        redirect('dashboard/data_penilaian');
    }

    public function get_perhitungan()
    {
        $id = $this->input->post('id_perhitungan');
        // $table = 'perhitungan';
        // $id_field = 'id';
        // $data = $this->m_data->get_record_by_id($table, $id_field, $id);
        $id_petugas = $_SESSION['id'];
        
        $level = $_SESSION['level'];
        if($level == 'petugas') {
            $id_petugas = $_SESSION['id'];
            $data= $this->db->query("SELECT * FROM alternatif, petugas, perhitungan WHERE alternatif.id_petugas = petugas.id_petugas AND petugas.id_petugas = '$id_petugas' AND alternatif.id_alternatif = perhitungan.id_alternatif AND perhitungan.id = '$id'")->row();
        }else{
            $data= $this->db->query("SELECT * FROM alternatif, perhitungan WHERE alternatif.id_alternatif = perhitungan.id_alternatif AND perhitungan.id = '$id'")->row();
        }

        if ($data) {
            // Mengambil nama alternatif berdasarkan id_alternatif
            $alternatif = $this->db->get_where('alternatif', array('id_alternatif' => $data->id_alternatif))->row();
            if ($alternatif) {
                $data->nama = $alternatif->nama_warga; // Menambahkan nama ke data
            }
            echo json_encode($data);
        } else {
            echo json_encode(array('error' => 'Data tidak ditemukan'));
        }
    }

    public function update_penilaian()
    {
        $id = $this->input->post('id_penilaian');
        $table = 'perhitungan'; // Tentukan nama tabel di sini atau buat dinamis
        $id_field = 'id'; // Tentukan nama field id di sini atau buat dinamis
        $data = array(
            'id_alternatif' => $this->input->post('id_alternatif'),
            'pendapatan' => $this->input->post('pendapatan'),
            'j_tanggungan' => $this->input->post('tanggungan'),
            'pendidikan' => $this->input->post('pendidikan'),
            'pekerjaan' => $this->input->post('pekerjaan')
        );
        $this->m_data->update_record($table, $id_field, $id, $data);
        redirect('dashboard/data_penilaian');
    }

    // public function data_hasil_akhir()
    // {
    //     $data = $this->load->controller()->data_hasil_akhir();

    //     var_dump($data);
    //     die();


    //     $this->load->view('dashboard/v_header');
    //     $this->load->view('dashboard/v_data_hasil_akhir', $data);
    //     $this->load->view('dashboard/v_footer');
    // }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login?alert=logout');
    }

    public function verifikasi($id){
        $where  = array(
            'id'    => $id
        );
        $data   = array(
            'status'    => 1
        );
        $this->load->model('m_data');
        $this->m_data->update_data($where,$data,'perhitungan');
        redirect(base_url().'dashboard/data_hasil_akhir');
    }

    public function cancel($id){
        $where  = array(
            'id'    => $id
        );
        $data   = array(
            'status'    => 2
        );
        $this->load->model('m_data');
        $this->m_data->update_data($where,$data,'perhitungan');
        redirect(base_url().'dashboard/data_hasil_akhir');
    }

    public function data_hasil_akhir()
    {
        $this->load->model('m_data');

        // Mengambil bobot dari tabel kriteria
        $bobot_kriteria = $this->db->query("SELECT * FROM kriteria")->result();

        // Mengambil data alternatif dan nilai kriteria dari tabel perhitungan
        // $alternatif = $this->db->query("
        // SELECT a.nama_warga, p.pendapatan, p.j_tanggungan, p.pendidikan, p.pekerjaan, a.id_alternatif
        // FROM alternatif a JOIN perhitungan p ON a.id_alternatif = p.id_alternatif")->result();
        if($this->session->userdata('admin')){
            $id_petugas = $_SESSION['id'];
            $alternatif = $this->db->query("SELECT * FROM alternatif, petugas, perhitungan WHERE alternatif.id_petugas = petugas.id_petugas AND petugas.id_petugas = '$id_petugas' AND alternatif.id_alternatif = perhitungan.id_alternatif")->result();
        }else{
            $alternatif = $this->db->query("SELECT * FROM alternatif, perhitungan WHERE alternatif.id_alternatif = perhitungan.id_alternatif")->result();
        }
        
        //  $alternatif = $this->db->query("SELECT * FROM alternatif, perhitungan WHERE alternatif.id_alternatif = perhitungan.id_alternatif")->result();
        // Inisialisasi array untuk menyimpan hasil akhir perhitungan
        $hasil_akhir = [];

        // Normalisasi matriks keputusan
        $sum_columns = [
            'pendapatan' => 0,
            'j_tanggungan' => 0,
            'pendidikan' => 0,
            'pekerjaan' => 0
        ];

        foreach ($alternatif as $alt) {
            $sum_columns['pendapatan'] += $alt->pendapatan;
            $sum_columns['j_tanggungan'] += $alt->j_tanggungan;
            $sum_columns['pendidikan'] += $alt->pendidikan;
            $sum_columns['pekerjaan'] += $alt->pekerjaan;
        }

        // Hitung nilai utilitas relatif
        foreach ($alternatif as $alt) {
            $hasil = new stdClass();
            $hasil->nama_warga = $alt->nama_warga;
            $hasil->id         = $alt->id;
            $hasil->status     = $alt->status;

            $nilai_utility =
                (($alt->pendapatan / $sum_columns['pendapatan']) * $bobot_kriteria[0]->nilai) +
                (($alt->j_tanggungan / $sum_columns['j_tanggungan']) * $bobot_kriteria[1]->nilai) +
                (($alt->pendidikan / $sum_columns['pendidikan']) * $bobot_kriteria[2]->nilai) +
                (($alt->pekerjaan / $sum_columns['pekerjaan']) * $bobot_kriteria[3]->nilai);

            $hasil->nilai_akhir = $nilai_utility;
            $hasil_akhir[] = $hasil;
        }

        // Passing data ke view
        $data['hasil_akhir'] = $hasil_akhir;
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_hasil_akhir', $data);
        $this->load->view('dashboard/v_footer');

        // return $data;
    }

    // PROFIL
    public function profil()
    {
    // id pengguna yang sedang login
    $id = $this->session->userdata('id');
    $where = array(
    'id_petugas' => $id
    );

    $data['profil'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$id'")->row();

$this->load->view('dashboard/v_header');
$this->load->view('dashboard/v_profil',$data);
$this->load->view('dashboard/v_footer');
}

// EDIT PROFIL
public function update_profil()
{
// Wajib isi nama dan email
$this->form_validation->set_rules('nama','Nama','required');
$this->form_validation->set_rules('username','Username','required');
$this->form_validation->set_rules('pass','Pass','required');
    if($this->form_validation->run() != false){
        $id = $this->session->userdata('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $pass = $this->input->post('pass');
        $where = array(
        'id_petugas' => $id
        );
        $data = array(
        'nama' => $nama,
        'username' => $username,
        'password' => $pass
        );
        $this->m_data->update_data($where,$data,'petugas');
        redirect(base_url().'dashboard/profil/?alert=sukses');
    }else{  
        // id pengguna yang sedang login
        $id_pengguna = $this->session->userdata('id');
        $where = array(
        'id_petugas' => $id_pengguna
        );
        $data['profil'] = $this->db->query("SELECT * FROM petugas WHERE id_petugas = '$id'")->row();

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_profil',$data);
        $this->load->view('dashboard/v_footer');
        }
}
}
