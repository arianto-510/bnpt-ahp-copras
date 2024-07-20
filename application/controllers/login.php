<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function index(){
        $this->load->view('v_login');
    }

    public function login_aksi(){
        $nik        = $this->input->post('nik');
        $telepon    = $this->input->post('telepon');

        $where = array(
            'nik'       => $nik,
            'telepon'   => $telepon
        );

        $this->load->model('M_data');
        $cek = $this->M_data->cek_login('alternatif', $where)->num_rows();
        if($cek > 0){
            $data = $this->db->query("SELECT * FROM alternatif WHERE nik = '$nik' AND telepon = '$telepon'")->row();
            $data_session = array(
                'id'        => $data->id_alternatif,
                'nama'      => $data->nama,
                'nik'       => $data->nik,
                'telepeon'  => $data->telepon,
                'jk'        => $data->jenis_kelamin,
                'alamat'    => $data->alamat,
                'status'    => 'telah_login'
            );
            $this->session->set_userdata($data_session);
            redirect(base_url().'dashboard');
        }else{
            redirect(base_url().'login?alert=gagal');
        }
    }

    public function login_admin(){
        $this->load->view('login_admin');
    }

    public function login_admin_aksi(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'username'  => $username,
            'password'  => $password
        );

        $this->load->model('M_data');
        $cek = $this->M_data->cek_login('petugas', $where)->num_rows();
        if($cek > 0){
            $where = array(
                'username'  => $username,
                'password'  => $password
            );
            $data = $this->M_data->cek_login('petugas',$where)->row();
            $data_session = array(
                'id'        => $data->id_petugas,
                'nama'      => $data->nama,
                'status'    => 'telah_login'
            );
            $this->session->set_userdata($data_session);
            redirect(base_url().'dashboard');
        }else{
            redirect(base_url().'login/login_admin?alert=gagal');
        }
    }

}