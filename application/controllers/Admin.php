<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model', 'model');
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['totaljo'] = $this->model->getTotalJo();
        $data['totalyear'] = $this->model->getTotalJoYear();
        $data['receive'] = $this->model->getWaitReceive();
        $data['finish'] = $this->model->getJoFinishPerMonth();
        $data['month'] = $this->model->getJoPerMonth();
        $data['wait'] = $this->model->getWaitingApproveJo();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


    public function jobComplete()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/jobcomplete', $data);
        $this->load->view('templates/footer');
    }

    public function tampilrole()
    {
        $dataAll = $this->model->getRole();
        echo json_encode($dataAll);
    }

    public function simpandata()
    {
        $data = array(
            'role' => $this->input->post('role')
        );

        $simpantData = $this->model->saveRole($data);
        // Cek apakah data berhasil tersimpan
        if ($simpantData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function editdata()
    {
        $id = $this->input->post('id_edit');
        $data = array(
            'id' => $id,
            'role' => $this->input->post('role_edit')
        );

        $this->db->where('id', $id);
        $this->db->update('user_role', $data);

        // Check if data is successfully updated
        if ($this->db->affected_rows() > 0) {
            echo "success";
        } else {
            echo "error";
        }
    }

    public function completeJob($id)
    {
        $updatedData = [
            'status' => '10'
        ];

        $update = $this->model->updateJobOrder($id, $updatedData);


        if ($update) {
            $msg['status'] = 'success';
        } else {
            $msg['status'] = 'error';
            $msg['message'] = 'Failed!!';
        }
        echo json_encode($msg);
    }

    public function updateJob($id)
    {
        $updateData = [
            'no_file' => $this->input->post('no_file')
        ];

        $update = $this->model->updateJobOrder($id, $updateData);

        if ($update) {
            $msg['status'] = 'success';
        } else {
            $msg['status'] = 'error';
            $msg['message'] = 'Failed!!';
        }
        echo json_encode($msg);
    }


    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role', $data);
        $this->load->view('templates/footer');
    }


    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', 1);
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!</div>');
    }

    public function getJo4()
    {
        $dataAll = $this->model->getJoStatus4();
        echo json_encode($dataAll);
    }

    public function deletemember()
    {
        $id = $this->input->post('id');
        $delete = $this->db->delete('member', ['id' => $id]);

        if ($delete) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Please Try Again, Maybe Network Error !']);
        }
    }
}
