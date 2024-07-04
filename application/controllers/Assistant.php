<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assistant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        login_cek();
        $this->load->model('assistant_model', 'model');
        $this->load->model('menu_model', 'menu_model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('member', ['id' => $this->session->userdata('id')])->row_array();
        $dataMember = $this->model->getDataJo();

        // Pisahkan plant_names dan plant_ids menjadi array
        $plants = explode(',', $dataMember['plant_names']);
        $plant_ids = explode(',', $dataMember['plant_ids']);

        // Buat array untuk menyimpan data plants dan total job order
        $data['plants'] = [];

        // Loop melalui setiap plant_id untuk mendapatkan total job order
        foreach ($plant_ids as $index => $plant_id) {
            $total_jo = $this->model->get_total_job_orders($plant_id);
            $data['plants'][] = [
                'name' => $plants[$index],
                'id_plant' => $plant_id,
                'total_jo' => $total_jo['total_jo']
            ];
        }

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('assistant/index', $data);
        $this->load->view('templates/footer');
    }

    public function informasi()
    {
        $data['title'] = 'Informasi Job Order';
        $data['user'] = $this->db->get_where('member', ['id' => $this->session->userdata('id')])->row_array();
        //get Data Plant
        $data['plants'] = $this->menu_model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('assistant/informasi', $data);
        $this->load->view('templates/footer');
    }

    public function tampilinformasi()
    {
        $dataAll = $this->model->getInformasi();
        echo json_encode($dataAll);
    }

    public function simpanInformasi()
    {
        $id_user = $this->session->userdata('id');

        $data = array(
            'id_user' => $id_user,
            'no_info' => $this->input->post('no_info'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'id_plant' => $this->input->post('plant'),
            'pelaksana' => $this->input->post('pelaksana'),
            'tgl_create' => date('Y-m-d')
        );

        $result = $this->model->saveInformation($data);
        echo json_encode(array('status' => $result ? 'success' : 'error'));
    }

    public function update_data()
    {
        $id = $this->input->post('id');

        $data = array(
            'no_info' => $this->input->post('no_info'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'id_plant' => $this->input->post('plant'),
            'pelaksana' => $this->input->post('pelaksana')
        );

        $result = $this->model->updateInformation($id, $data);
        echo json_encode(array('status' => $result ? 'success' : 'error'));
    }

    public function delete_data()
    {
        $id = $this->input->post('id');
        $result = $this->model->deleteInformation($id);
        echo json_encode(array('status' => $result ? 'success' : 'error'));
    }
}
