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

        // var_dump($username.' '.$password);
        // die;

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

    public function register_aksi(){

        $nama           = $this->input->post('nama');
        $username       = $this->input->post('username');
        $password       = $this->input->post('password');
        $konf_password  = $this->input->post('konf-password');

        if($password != $konf_password){
            redirect(base_url().'login/register?alert=password-beda');
        }else{
            $where = array(
                'username'  => $username
            );

            $this->load->model('M_data');
            $cek = $this->M_data->cek_login('petugas',$where)->num_rows();
            if($cek > 0){
                redirect(base_url().'login/register?alert=sudah_ada');
            }else{
                $data = array(
                    'nama'      => $nama,
                    'username'  => $username,
                    'password'  => $konf_password,
                    'status'    => 1
                );

                $this->M_data->insert_data($data, 'petugas');
                redirect(base_url().'login/register?alert=berhasil');
            }
        }
    }
}