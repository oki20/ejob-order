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
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['plant'] = $this->jomodel->getDataPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('joborder/index', $data);
        $this->load->view('templates/footer');
    }

    public function plant($id)
    {
        $data['title'] = 'JOB ORDER PLANT';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
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

    public function updatedata()
    {
        $id = $this->input->post('id_jo');
        $data = array(
            'no_jo' => $this->input->post('no_jo'),
            'tgl_jo' => $this->input->post('tgl_jo'),
            'tgl_terima' => $this->input->post('tgl_terima'),
            'cc_no' => $this->input->post('cc_no'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'pelaksana' => $this->input->post('pelaksana'),
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
        $updateData = $this->jomodel->update_data($id, $data);

        // Cek apakah data berhasil tersimpan
        if ($updateData) {
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

    public function edit()
    {
        $id = $this->input->get('id');
        $data = $this->db->get_where('pengajuan_job_order', ['id' => $id])->row_array();
        echo json_encode($data);
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $delete = $this->db->delete('pengajuan_job_order', ['id' => $id]);

        if ($delete) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Please Try Again, Maybe Network Error !']);
        }
    }

    public function approveData()
    {
        $id = $this->input->post("id");

        // Lakukan penyimpanan data ke database
        $data = array(
            'status' => '10'
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
