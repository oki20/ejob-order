<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        login_cek();
        $this->load->model('leader_model', 'model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('member', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('leader/index', $data);
        $this->load->view('templates/footer');
    }
}
