<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Engdepthead extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        $this->load->model('menu_model', 'model');
        $this->load->model('leader_model', 'lead_model');
    }

    public function delete()
    {
        $kode = $this->input->post('id_plant');
        // Panggil model untuk menghapus data
        $result = $this->model->deleteData($kode);
        echo json_encode($result);
    }

    public function request()
    {
        $data['title'] = 'Request Job Order';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('engdepthead/request', $data);
        $this->load->view('templates/footer');
    }

    public function joborder()
    {
        $data['title'] = 'Monitoring Job Order';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['anggota'] = $this->lead_model->getAnggota();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('engdepthead/joborder', $data);
        $this->load->view('templates/footer');
    }

    //Reject Job Order
    public function reject()
    {
        $data['title'] = 'Reject Job Order';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('engdepthead/reject', $data);
        $this->load->view('templates/footer');
    }

    public function tampilreject()
    {
        $dataAll = $this->model->getRejectJo();
        echo json_encode($dataAll);
    }

    public function tampilrequest()
    {
        $dataAll = $this->model->getRequestJo4();
        echo json_encode($dataAll);
    }

    public function approveData()
    {
        $id = $this->input->post("id");

        // Lakukan penyimpanan data ke database
        $data = array(
            'status' => '5',
            'id_eng_depthead' => $this->session->userdata('id')
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
        $saran_dept = $this->input->post("saran_dept");
        // Lakukan penyimpanan data ke database
        $data = array(
            'status' => '9',
            'saran_dept' => $saran_dept
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
