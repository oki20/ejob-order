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
        login_cek();
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

    public function simpandata()
    {
        $data = array(
            'no_jo' => $this->input->post('no_jo'),
            'tgl_jo' => $this->input->post('tgl_jo'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'cc_no' => $this->input->post('cc_no'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'tujuan' => $this->input->post('tujuan'),
            'rencana' => $this->input->post('rencana'),
            'cep_no' => $this->input->post('cep_no'),
            'dwg_no' => '-',
            'mesin_no' => '-',
            'id_plant' => $this->input->post('id_plant'),
            'id_depthead' => '-',
            'id_planthead' => '-',
            'id_pemesan' => $this->input->post('id_pemesan'),
            'lampiran' => '-',
            'no_file' => $this->input->post('no_file'),
            'golongan' => $this->input->post('golongan'),
            'klasifikasi' => $this->input->post('klasifikasi'),
            'departemen_lain' => $this->input->post('departemen_lain'),
            'status' => '5'
        );

        //insert data via model
        $simpanData = $this->jomodel->save_data($data);

        // Cek apakah data berhasil tersimpan
        if ($simpanData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function closejo()
    {
        $id = $this->input->post('id');
        $result = $this->model->closeJob($id);
        echo json_encode($result);
    }
}
