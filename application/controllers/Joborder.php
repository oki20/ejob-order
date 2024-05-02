<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joborder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('menu_model', 'model');
        $this->load->model('jo_model', 'jomodel');
    }

    public function index()
    {
        $data['title'] = 'Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['plant'] = $this->jomodel->getDataPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('joborder/index', $data);
        $this->load->view('templates/footer');
    }

    public function plant($id)
    {
        $data['title'] = 'Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['plant'] = $this->jomodel->getPlant($id);

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('joborder/plant', $data);
        $this->load->view('templates/footer');
    }

    public function tampiljoplant($id)
    {
        $dataAll = $this->jomodel->getDataJo($id);
        echo json_encode($dataAll);
    }
}
