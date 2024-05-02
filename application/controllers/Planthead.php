<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planthead extends CI_Controller
{
    //Request Job Order
    public function request()
    {
        $data['title'] = 'Request Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('planthead/request', $data);
        $this->load->view('templates/footer');
    }
}
