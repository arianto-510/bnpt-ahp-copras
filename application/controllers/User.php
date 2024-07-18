<?php
defined('BASEPATH') OR exit('No direc access allowed');

class User extends CI_Controller {
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');

    // //     // function login nanti disini
    }

    public function index(){
        $data['user'] = $this->m_data->get_data('petugas')->result();
        $this->load->view('dashboard/v_header');
        $this->load->view('dashboard/v_user',$data);
        $this->load->view('dashboard/v_footer');
    }
}