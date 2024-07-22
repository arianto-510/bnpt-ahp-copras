<?php

class Ahpcopras extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');

        if ($this->session->userdata('status') != "telah_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function kalkulasi()
    {
        // Mendapatkan data matriks dari POST
        $matrix = $this->input->post('matrix');

        // Ubah data POST menjadi matriks 2D
        $kriteria_count = count($this->m_data->get_kriteria()); // Sesuaikan dengan jumlah kriteria
        $matrix_2d = array_chunk($matrix, $kriteria_count);

        // var_dump($matrix_2d);
        // die();

        // Lakukan perhitungan AHP
        $weights = $this->calculateAHP($matrix_2d);

        // Simpan hasil pembobotan ke database
        $this->update_weights_in_db($weights);

        // Tampilkan hasil
        $data['arr'] = $matrix_2d;
        $data['kriteria'] = $this->m_data->get_kriteria();
        $data['jumlah_kriteria'] = count($data['kriteria']);
        $data['weights'] = $weights;

        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_kriteria', $data);
        $this->load->view('dashboard/v_footer');
    }

    private function calculateAHP($matrix)
    {
        // Menghitung jumlah kolom
        $column_sums = array();
        foreach ($matrix as $row) {
            foreach ($row as $key => $value) {
                if (!isset($column_sums[$key])) {
                    $column_sums[$key] = 0;
                }
                $column_sums[$key] += $value;
            }
        }

        // Membagi setiap elemen dengan jumlah kolomnya
        $normalized_matrix = array();
        foreach ($matrix as $row) {
            $normalized_row = array();
            foreach ($row as $key => $value) {
                $normalized_row[$key] = $value / $column_sums[$key];
            }
            $normalized_matrix[] = $normalized_row;
        }

        // Menghitung rata-rata setiap baris untuk mendapatkan bobot
        $weights = array();
        foreach ($normalized_matrix as $row) {
            $weights[] = array_sum($row) / count($row);
        }

        return $weights;
    }

    private function update_weights_in_db($weights)
    {
        // Ambil data kriteria dari database
        $kriteria = $this->m_data->get_kriteria();

        // Update setiap kriteria dengan bobot baru
        foreach ($kriteria as $index => $k) {
            $data = array('nilai' => $weights[$index]);
            $this->m_data->update_record('kriteria', 'id_kriteria', $k->id_kriteria, $data);
        }
    }

    public function data_hasil_akhir()
    {
        $this->load->model('m_data');

        // Mengambil bobot dari tabel kriteria
        $bobot_kriteria = $this->db->query("SELECT * FROM kriteria")->result();

        // Mengambil data alternatif dan nilai kriteria dari tabel perhitungan
        $alternatif = $this->db->query("
        SELECT a.nama, p.pendapatan, p.j_tanggungan, p.pendidikan, p.pekerjaan, a.id_alternatif
        FROM alternatif a
        JOIN perhitungan p ON a.id_alternatif = p.id_alternatif
    ")->result();

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
            $hasil->nama = $alt->nama;

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
        // $akhr = $hasil_akhir;
        // var_dump($akhr);
        // die();


        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_data_hasil_akhir', $data);
        $this->load->view('dashboard/v_footer');
    }
}
