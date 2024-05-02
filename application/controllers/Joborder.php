<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joborder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('menu_model', 'model');
    }

    public function index()
    {
        $data['title'] = 'Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['plant'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('joborder/index', $data);
        $this->load->view('templates/footer');
    }
}
