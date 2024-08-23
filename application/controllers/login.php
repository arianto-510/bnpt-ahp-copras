<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');

        if ($this->session->userdata('status') == "telah_login") {
            redirect(base_url() . 'dashboard');
        }
    }

    public function index()
    {
        $this->load->view('v_login');
    }

    public function cek_penerimaan_bpnt()
    {
        $nik        = $this->input->post('nik');
        $telepon    = $this->input->post('telepon');

        $where = array(
            'nik'       => $nik,
            'telepon'   => $telepon
        );

        $this->load->model('M_data');
        $cek = $this->M_data->cek_login('alternatif', $where)->num_rows();
        if ($cek > 0) {
            $data = $this->db->query("SELECT * FROM alternatif WHERE nik = '$nik' AND telepon = '$telepon'")->row();
            $data = $this->M_data->cek_login('alternatif', $where)->row();
            $data_session = array(
                'nik'        => $data->nik,
                'nama'       => $data->nama_warga,
            );
            $this->session->set_userdata($data_session);
            
            // $status = 'masuk';
            // $this->hasil($data->nik, $status);
            $this->hasil();
            // redirect(base_url().'login/cek_penerimaan_bpnt/'.$data->nik);
        } else {
            redirect(base_url() .'login?alert=gagal');
        }
    }

    // private function hasil($nik, $status)
    private function hasil()
    {

        $this->load->model('m_data');

        // Mengambil bobot dari tabel kriteria
        $bobot_kriteria = $this->db->query("SELECT * FROM kriteria")->result();

        // Mengambil data alternatif dan nilai kriteria dari tabel perhitungan
        // $alternatif = $this->db->query("
        // SELECT a.nik, a.id_alternatif, a.nama_warga, p.pendapatan, p.j_tanggungan, p.pendidikan, p.pekerjaan, a.id_alternatif
        // FROM alternatif a
        // JOIN perhitungan p ON a.id_alternatif = p.id_alternatif")->result();
        $nik    = $_SESSION['nik'];
        $petugas    = $this->db->query("SELECT * FROM alternatif WHERE nik = '$nik'")->row();
        $alternatif = $this->db->query("SELECT * FROM alternatif, petugas, perhitungan WHERE alternatif.id_petugas = petugas.id_petugas AND petugas.id_petugas = '$petugas->id_petugas' AND alternatif.id_alternatif = perhitungan.id_alternatif")->result();
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
            $hasil->nama    = $alt->nama_warga;
            $hasil->nik     = $alt->nik;
            $hasil->status  = $alt->status;

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
        $data['pengumuman'] = $this->db->query("SELECT * FROM alternatif, petugas WHERE petugas.id_petugas = alternatif.id_petugas AND alternatif.nik = '$nik'")->row();
        $this->load->view('v_pengumuman', $data);
    }

    // public function login_aksi()
    // {
    //     $nik        = $this->input->post('nik');
    //     $telepon    = $this->input->post('telepon');

    //     $where = array(
    //         'nik'       => $nik,
    //         'telepon'   => $telepon
    //     );

    //     $this->load->model('M_data');
    //     $cek = $this->M_data->cek_login('alternatif', $where)->num_rows();
    //     if ($cek > 0) {
    //         $data = $this->db->query("SELECT * FROM alternatif WHERE nik = '$nik' AND telepon = '$telepon'")->row();
    //         $data_session = array(
    //             'id'        => $data->id_alternatif,
    //             'nama'      => $data->nama,
    //             'nik'       => $data->nik,
    //             'telepeon'  => $data->telepon,
    //             'jk'        => $data->jenis_kelamin,
    //             'alamat'    => $data->alamat,
    //             'status'    => 'telah_login'
    //         );
    //         $this->session->set_userdata($data_session);
    //         redirect(base_url() . 'dashboard');
    //     } else {
    //         redirect(base_url() . 'login?alert=gagal');
    //     }
    // }

    public function login_admin()
    {
        $this->load->view('login_admin');
    }

    public function login_admin_aksi()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username'  => $username,
            'password'  => $password
        );

        $this->load->model('M_data');
        $cek = $this->M_data->cek_login('petugas', $where)->num_rows();
        if ($cek > 0) {
            $where = array(
                'username'  => $username,
                'password'  => $password
            );
            $data = $this->M_data->cek_login('petugas', $where)->row();
            $data_session = array(
                'id'        => $data->id_petugas,
                'nama'      => $data->nama,
                'status'    => 'telah_login',
                'target'    => $data->jum_target,
                'level'     => $data->status
            );
            $this->session->set_userdata($data_session);
            redirect(base_url() . 'dashboard');
        } else {
            redirect(base_url() . 'login/login_admin?alert=gagal');
        }
    }
}
