<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depthead extends CI_Controller
{   

    public function __construct()
{        
    parent::__construct();
    //is_logged_in();
    $this->load->model('menu_model','model');
}

    public function request()
    {
        $data['title'] = 'Request Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('depthead/request', $data);
        $this->load->view('templates/footer');
    }


    //Reject Job Order
    public function reject()
    {
        $data['title'] = 'Reject Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('depthead/reject', $data);
        $this->load->view('templates/footer');
    }

    public function tampilreject()
    {
        $dataAll = $this->model->getRejectJo();
        echo json_encode($dataAll);
    }

    public function tampilrequest()
    {
        $dataAll = $this->model->getRequestJo1();
        echo json_encode($dataAll);
    }
}