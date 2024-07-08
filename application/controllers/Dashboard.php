<?php
defined('BASEPATH') OR exit('No direc access allowed');

class Dashboard extends CI_Controller {
    // function __construct()
    // {
    //     parent::__construct();

    //     // function login nanti disini
    // }

    public function index()
    {
        $this->load->view('dashboard/v_index');
    }
}