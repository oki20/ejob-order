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
        $data['title'] = 'Data Plant';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/plant', $data);
        $this->load->view('templates/footer');
    }

    public function member()
    {
        $data['title'] = 'Data Member';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['plant'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/member', $data);
        $this->load->view('templates/footer');
    }

    public function admin()
    {
        $data['title'] = 'Data Admin';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['plant'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('master/admin', $data);
        $this->load->view('templates/footer');
    }

    public function tampilmember()
    {
        $dataAll = $this->model->getMember();
        echo json_encode($dataAll);
    }

    public function tampiladmin()
    {
        $dataAll = $this->model->getAdmin();
        echo json_encode($dataAll);
    }

    public function tampildata()
    {
        header('Content-Type: application/json');
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

    public function tambahUser()
    {
        $data = [
            'name' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'nim' => $this->input->post('nik'),
            'image' => 'default.jpg',
            'whatsapp' => $this->input->post('whatsapp'),
            'password' => password_hash('12345', PASSWORD_DEFAULT),
            'role_id' => $this->input->post('jabatan'),
            'date_created' => time(),
            'is_active' => $this->input->post('status')
        ];
        $this->db->insert('user', $data);

        // Debug: Cek apakah query berhasil dijalankan
        if ($this->db->affected_rows() > 0) {
            log_message('debug', "User successfully inserted into the database.");
            echo json_encode(['status' => 'success']);
        } else {
            log_message('error', "Failed to insert user.");
            echo json_encode(['status' => 'failed']);
        }
    }


    public function tambahmember()
    {
        $name = $this->input->post('name');
        $nim = $this->input->post('nim');
        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
        $bagian = $this->input->post('bagian');
        $jabatan = $this->input->post('jabatan');
        $select_plant = $this->input->post('plant');
        $email = $this->input->post('email');

        if ($jabatan == 'L') {
            $role_id = 8;
        } else if ($jabatan == 'SH') {
            $role_id = 9;
        } else if ($jabatan == 'ADH') {
            $role_id = 10;
        }

        $data = array(
            'name' => htmlspecialchars($name, true),
            'nim' => htmlspecialchars($nim, true),
            'image' => 'default.jpg',
            'password' => $password,
            'bagian' => htmlspecialchars($bagian, true),
            'jabatan' => htmlspecialchars($jabatan, true),
            'plant' => htmlspecialchars($select_plant, true),
            'email' => htmlspecialchars($email, true),
            'role_id' => $role_id
        );
        $simpanData = $this->model->addMember($data);

        if ($simpanData) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
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
        $data['title'] = 'Data User';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

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

    public function tampillead()
    {
        $dataAll = $this->model->getLead();
        echo json_encode($dataAll);
    }

    public function deleteuser()
    {
        $id = $this->input->post('id');
        // Panggil model untuk menghapus data
        $result = $this->model->deleteuser($id);
        echo json_encode($result);
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

    public function getMemberById()
    {
        $id = $this->input->get('id');
        $data = $this->model->getMemberById($id);
        echo json_encode($data);
    }

    public function editMember()
    {
        $id = $this->input->post('id');
        $plant = $this->input->post('plant'); // This should be an array

        // Ensure $plant is an array
        if (!is_array($plant)) {
            $plant = explode(',', $plant); // Convert to array if necessary
        }

        $data = array(
            'name' => $this->input->post('name'),
            'nim' => $this->input->post('nim'),
            'no_hp' => $this->input->post('no_hp'),
            'bagian' => $this->input->post('bagian'),
            'jabatan' => $this->input->post('jabatan'),
            'plant' => implode(',', $plant) // Convert array to comma-separated string
        );

        $result = $this->model->updateMember($id, $data);

        // Check if data is successfully updated
        if ($result) {
            echo "success";
        } else {
            echo "error";
        }
    }
}
