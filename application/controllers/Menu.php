<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model', 'model');
    }

    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');

        /*$this->form_validation->set_rules('menu', 'Menu', 'required');

        //if ($this->form_validation->run() == false) {
        //} else {
        //$this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
        //$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!</div>');
        //redirect('menu');
        //}*/
    }

    public function tampilmenu()
    {
        $dataAll = $this->model->getMenu();
        echo json_encode($dataAll);
    }

    public function simpandata()
    {
        // Tangkap data yang dikirim dari Ajax
        $menu = $this->input->post('menu');

        // Lakukan penyimpanan data ke database
        $data = array(
            'menu' => $menu // Simpan nama file gambar ke dalam database
        );

        // Insert data via model
        $simpanData = $this->model->save_data_menu($data);

        // Cek apakah data berhasil tersimpan
        if ($simpanData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function editdata()
    {
        $id = $this->input->post('id');
        $menu = $this->input->post('menu');

        // Lakukan penyimpanan data ke database
        $data = array(
            'menu' => $menu // Simpan nama file gambar ke dalam database
        );

        $this->model->updateData_menu($id, $data); // Ubah $id menjadi $id_produksi

        // Check if data is successfully updated
        if ($this->db->affected_rows() > 0) {
            echo "success";
        } else {
            echo "error";
        }
    }


    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() ==  false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!</div>');
            redirect('menu/submenu');
        }
    }
}
