<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model', 'model');
    }

    public function plant()
    {
        $data['title'] = 'Daftar Plant';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/plant', $data);
        $this->load->view('templates/footer');
    }

    public function tampildata()
    {
        $dataAll = $this->model->getPlant();
        echo json_encode($dataAll);
    }

    public function simpandata()
    {
        // Tangkap data yang dikirim dari Ajax
        $nama = $this->input->post('nama');

        // Lakukan penyimpanan data ke database
        $data = array(
            'nama' => $nama // Simpan nama file gambar ke dalam database
        );

        // Insert data via model
        $simpanData = $this->model->save_data_plant($data);

        // Cek apakah data berhasil tersimpan
        if ($simpanData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function editdata()
    {
        $id_plant = $this->input->post('id_plant');
        $nama = $this->input->post('nama');

        // Lakukan penyimpanan data ke database
        $data = array(
            'nama' => $nama // Simpan nama file gambar ke dalam database
        );

        $this->model->updateData($id_plant, $data); // Ubah $id menjadi $id_produksi

        // Check if data is successfully updated
        if ($this->db->affected_rows() > 0) {
            echo "success";
        } else {
            echo "error";
        }
    }

    public function delete()
    {
        $kode = $this->input->post('id_plant');
        // Panggil model untuk menghapus data
        $result = $this->model->deleteData($kode);
        echo json_encode($result);
    }

    //controller untuk tampil user
    public function user()
    {
        $data['title'] = 'Daftar User';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/user', $data);
        $this->load->view('templates/footer');
    }

    public function tampiluser()
    {
        $dataAll = $this->model->getUser();
        echo json_encode($dataAll);
    }
}
