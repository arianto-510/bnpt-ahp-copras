<?php

class AhpCopras extends CI_Controller
{
    public function index()
    {
        $kriteria = $this->AhpCoprasModel->get_kriteria();
        $alternatif = $this->AhpCoprasModel->get_alternatif();
        $penilaian = $this->AhpCoprasModel->get_penilaian();


        $matriks_ahp = [
            [1, 3, 5, 3],
            [0.33, 1, 3, 3],
            [0.2, 0.33, 1, 0.33],
            [0.33, 0.33, 3, 1]
        ];

        // Hitung bobot AHP
        $bobot = $this->hitung_bobot_ahp($matriks_ahp);

        print_r($bobot);
    }

    private function hitung_bobot_ahp($matriks)
    {
        $jumlah_kolom = array();
        foreach ($matriks as $baris) {
            foreach ($baris as $k => $nilai) {
                $jumlah_kolom[$k] = isset($jumlah_kolom[$k]) ? $jumlah_kolom[$k] + $nilai : $nilai;
            }
        }


        $matriks_normalisasi = array();
        foreach ($matriks as $i => $baris) {
            foreach ($baris as $j => $nilai) {
                $matriks_normalisasi[$i][$j] = $nilai / $jumlah_kolom[$j];
            }
        }


        $bobot = array();
        foreach ($matriks_normalisasi as $baris) {
            $bobot[] = array_sum($baris) / count($baris);
        }

        return $bobot;
        // 0,501  0.50183871084216 
        // 0,262  0.26282214339558 
        // 0,076  0.076674032386186  
        // 0,158  0.15866511337608

    }
}
