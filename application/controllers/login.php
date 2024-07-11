<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function index(){
        $this->load->view('v_login');
    }

    public function login_aksi(){
        $username = $this->input->post('nik');
        $password = $this->input->post('telepon');

        $where = array(
            'nik'       => $username,
            'telepon'   => $password
        );

        $this->load->model('M_data');
        $cek = $this->M_data->cek_login('alternatif', $where)->num_rows();
        if($cek > 0){
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
            redirect(base_url().'dashboard');
        }else{
            redirect(base_url().'login/login_admin?alert=gagal');
        }
    }

}