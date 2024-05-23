<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Planthead extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('menu_model', 'model');
    }

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

    public function reject()
    {
        $data['title'] = 'Reject Job Order';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('planthead/reject', $data);
        $this->load->view('templates/footer');
    }

    public function tampilreject()
    {
        $dataAll = $this->model->getRejectJo();
        echo json_encode($dataAll);
    }

    public function tampilrequest()
    {
        $dataAll = $this->model->getRequestJo2();
        echo json_encode($dataAll);
    }

    public function approveData()
    {
        $id = $this->input->post("id");
        $saran_plant = $this->input->post("saran_plant");

        // Lakukan penyimpanan data ke database
        $data = array(
            'status' => '3',
            'saran_plant' => $saran_plant // Simpan nama file gambar ke dalam database
        );

        $this->model->appData($id, $data);

        // Check if data is successfully updated
        if ($this->db->affected_rows() > 0) {
            echo "success";
        } else {
            echo "error";
        }
    }

    public function rejectData()
    {
        $id = $this->input->post("id");
        $saran_plant = $this->input->post("saran_plant");

        // Lakukan penyimpanan data ke database
        $data = array(
            'status' => '7',
            'saran_plant' => $saran_plant // Simpan nama file gambar ke dalam database
        );

        $this->model->appData($id, $data);

        // Check if data is successfully updated
        if ($this->db->affected_rows() > 0) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
