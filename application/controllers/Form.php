<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('menu_model', 'model');
    }

    public function formjo($id)
    {
        $id_jo = 'Form Job Order';
        $data['title'] = $id_jo;
        $data['jo'] = $this->model->get_jo($id_jo);

        $this->load->view('templates/header', $data);
        $this->load->view('joborder/formjo', $data);
        $this->load->view('templates/footer');
    }
}
