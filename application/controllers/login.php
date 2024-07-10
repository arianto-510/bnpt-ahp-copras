<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    public function index(){
        $this->load->view('v_login');
    }

    public function login_aksi(){
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
            redirect(base_url().'login?alert=gagal');
        }
    }

    public function register(){
        $this->load->view('v_register');
    }
}