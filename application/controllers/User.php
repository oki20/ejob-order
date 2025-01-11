<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('menu_model', 'model');
        $this->load->model('leader_model', 'lead_model');
        $this->load->model('jo_model', 'jomodel');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        $data['plant'] = $this->jomodel->getDataPlant();

        //chart
        $data['totaljo'] = $this->model->getTotalJo();
        $data['totaljoprogres'] = $this->model->getTotalJoProgres();
        $data['totalyear'] = $this->model->getTotalJoYear();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
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
        $this->load->view('user/joborder', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $id = $this->input->post('id');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']      = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->dispay_errors();
                }
            }

            $this->db->set('name', $name);
            $this->db->where('id', $id);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('id', $this->session->userdata('id'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }

    //Request Job Order
    public function request()
    {
        $data['title'] = 'Request Job Order';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/request', $data);
        $this->load->view('templates/footer');
    }

    public function depthead()
    {
        $data['title'] = 'Data Dept. Head';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/depthead', $data);
        $this->load->view('templates/footer');
    }

    public function planthead()
    {
        $data['title'] = 'Data Plant Head';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/planthead', $data);
        $this->load->view('templates/footer');
    }

    public function reject()
    {
        $data['title'] = 'Reject Job Order';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();
        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/reject', $data);
        $this->load->view('templates/footer');
    }

    public function getJobOrderById()
    {
        $id = $this->input->get('id');
        $data['jo'] = $this->db->get_where('pengajuan_job_order', ['id' => $id])->row_array();
        $data['depthead'] = $this->db->get_where('user', ['id' => $data['jo']['id_depthead']])->row_array();
        $data['planthead'] = $this->db->get_where('user', ['id' => $data['jo']['id_planthead']])->row_array();
        echo json_encode($data);
    }

    public function tampilReject()
    {
        $dataAll = $this->model->getRejectJoUser();
        echo json_encode($dataAll);
    }

    public function tampilrequest()
    {
        $dataAll = $this->model->getRequestJo();
        echo json_encode($dataAll);
    }

    public function tampildatadh()
    {
        $dataAll = $this->model->getDh();
        echo json_encode($dataAll);
    }

    public function tampildataph()
    {
        $dataAll = $this->model->getPh();
        echo json_encode($dataAll);
    }

    public function getdepthead()
    {
        $plantId = $this->input->post('id_plant');
        $dept_head = $this->model->getDeptHeadid($plantId);
        echo json_encode($dept_head);
    }

    public function getplanthead()
    {
        $plantId = $this->input->post('id_plant');
        $dept_head = $this->model->getPlantHeadid($plantId);
        echo json_encode($dept_head);
    }

    public function simpanDh()
    {
        $nama = $this->input->post('name');
        $nim = $this->input->post('nim');
        $departemen = $this->input->post('departemen');
        $id_plant = $this->input->post('id_plant');
        $whatsapp = $this->input->post('whatsapp');
        $email = $this->input->post('email');

        // Check if the NIM or Email is already registered
        $nimExists = $this->model->checkNimExists($nim);
        $emailExists = $this->model->checkEmailExists($email);

        if ($nimExists) {
            echo json_encode(array('status' => 'error', 'message' => 'NIP Sudah Terdaftar.'));
            return;
        }

        if ($emailExists) {
            echo json_encode(array('status' => 'error', 'message' => 'Email Sudah Terdaftar.'));
            return;
        }

        $data = array(
            'name' => $nama,
            'email' => $email,
            'whatsapp' => $whatsapp,
            'image' => 'default.jpg',
            'password' => '$2y$10$RhtelfplzoMn5Z89erEU8.hLL0TB4VhaacEQCNolwOrh49CDoUfL.',
            'role_id' => '3',
            'is_active' => '1',
            'date_created' => time(),
            'nim' => $nim,
            'departemen' => $departemen,
            'id_plant' => $id_plant
        );

        $simpanData = $this->model->saveDh($data);
        // Cek apakah data berhasil tersimpan
        if ($simpanData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function simpanPh()
    {
        $nama = $this->input->post('name');
        $nim = $this->input->post('nim');
        $id_plant = $this->input->post('id_plant');
        $whatsapp = $this->input->post('whatsapp');
        $email = $this->input->post('email');

        // Check if the NIM or Email is already registered
        $nimExists = $this->model->checkNimExists($nim);
        $emailExists = $this->model->checkEmailExists($email);

        if ($nimExists) {
            echo json_encode(array('status' => 'error', 'message' => 'NIP Sudah Terdaftar.'));
            return;
        }

        if ($emailExists) {
            echo json_encode(array('status' => 'error', 'message' => 'Email Sudah Terdaftar.'));
            return;
        }

        $data = array(
            'name' => $nama,
            'email' => $email,
            'whatsapp' => $whatsapp,
            'image' => 'default.jpg',
            'password' => '$2y$10$RhtelfplzoMn5Z89erEU8.hLL0TB4VhaacEQCNolwOrh49CDoUfL.',
            'role_id' => '4',
            'is_active' => '1',
            'date_created' => time(),
            'nim' => $nim,
            'departemen' => '',
            'id_plant' => $id_plant
        );

        $simpanData = $this->model->saveDh($data);
        // Cek apakah data berhasil tersimpan
        if ($simpanData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function simpandata()
    {
        $no_jo = $this->input->post('no_jo');
        $id_pemesan = $this->session->userdata('id');
        $lampiran = isset($_FILES['lampiran']['name']) ? $_FILES['lampiran']['name'] : null;
        $pekerjaan = $this->input->post('pekerjaan');

        if (!empty($lampiran)) {
            // Specify the destination directory with spaces in the path
            $destinationPath = './assets/lampiran/';
            // Ensure the destination directory exists; create it if not
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $newImagePath = $destinationPath . $lampiran;
            move_uploaded_file($_FILES['lampiran']['tmp_name'], $newImagePath);
        } else {
            // Jika tidak ada PDF yang diunggah, atur path PDF ke null
            $lampiran = "";
        }

        $cek_jo = $this->model->chekDuplikatJo($no_jo);
        if ($cek_jo) {
            echo json_encode(array('status' => 'error', 'message' => 'Nomor Job Order Sudah Terpakai.'));
            return;
        }

        $dept_head = $this->input->post('dept_head');
        $dept_whatsaap = $this->model->getDataWa($dept_head);

        $data = array(
            'no_jo' => $no_jo,
            'tgl_jo' => $this->input->post('tgl_jo'),
            'cc_no' => $this->input->post('cc_no'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'tujuan' => $this->input->post('tujuan'),
            'rencana' => $this->input->post('rencana'),
            'cep_no' => $this->input->post('cep_no'),
            'dwg_no' => $this->input->post('dwg_no'),
            'mesin_no' => $this->input->post('mesin_no'),
            'id_plant' => $this->input->post('plant'),
            'id_depthead' => $this->input->post('dept_head'),
            'id_planthead' => $this->input->post('plant_head'),
            'lampiran' => $lampiran,
            'id_pemesan' => $id_pemesan,
            'status' => 1
        );

        // Insert data via model
        $simpanData = $this->model->save_data($data);

        // Cek apakah data berhasil tersimpan
        if ($simpanData) {
            // Generate WhatsApp URL and send message
            $url = base_url() . 'form/formjo/' . $simpanData;
            // $shortLink = json_decode(shortenLink($url));
            $requestBody = [
                "target"    => '0' . substr($dept_whatsaap, 2),
                "message"   => "*Informasi Pengajuan Job Order!* \n\n, \nBerikut Kami informasikan terkait pengajuan job order dengan Deskripsi sebagai berikut.\n\n*" . $pekerjaan . "* \n\nDetail informasi beserta persetujuan bisa klik link di bawah ini: \n\n" . $url . "\n\nCheers,\n*E-Job Administrator*",
                "typing"    => true
            ];
            $send = postWhatsappApi('send', $requestBody);
            $send = json_decode($send, true);

            if ($send['status']) {
                echo json_encode(array('status' => 'success', 'message' => 'Berhasil mengirimkan Pengajuan ke Dept. Head'));
                return true;
            } else {
                echo $send['reason'];
                die;
            }
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function updatedata($id)
    {
        $no_jo = $this->input->post('no_jo');
        $id_pemesan = $this->session->userdata('id');
        $lampiran = isset($_FILES['lampiran']['name']) ? $_FILES['lampiran']['name'] : null;

        if (!empty($lampiran)) {
            // Specify the destination directory with spaces in the path
            $destinationPath = './assets/lampiran/';
            // Ensure the destination directory exists; create it if not
            if (!is_dir($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }

            $newImagePath = $destinationPath . $lampiran;
            move_uploaded_file($_FILES['lampiran']['tmp_name'], $newImagePath);
        } else {
            // Jika tidak ada PDF yang diunggah, atur path PDF ke null
            $lampiran = "";
        }

        $data = array(
            'no_jo' => $no_jo,
            'tgl_jo' => $this->input->post('tgl_jo'),
            'cc_no' => $this->input->post('cc_no'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'tujuan' => $this->input->post('tujuan'),
            'rencana' => $this->input->post('rencana'),
            'cep_no' => $this->input->post('cep_no'),
            'dwg_no' => $this->input->post('dwg_no'),
            'mesin_no' => $this->input->post('mesin_no'),
            'id_plant' => $this->input->post('plant'),
            'id_depthead' => $this->input->post('dept_head'),
            'id_planthead' => $this->input->post('plant_head'),
            'lampiran' => $lampiran,
            'id_pemesan' => $id_pemesan,
            'status' => 1
        );

        // Insert data via model
        $updateData = $this->model->update_data($id, $data);

        // Cek apakah data berhasil tersimpan
        if ($updateData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function deleterequest()
    {
        $id = $this->input->post('id');
        // Panggil model untuk menghapus data
        $result = $this->model->deleteRequest($id);
        echo json_encode($result);
    }


    //Menampilkan job order yang sudah di approved Dept head
    //Request Job Order
    public function adepthead()
    {
        $data['title'] = 'App Dept. Head';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/adepthead', $data);
        $this->load->view('templates/footer');
    }

    public function tampiladepthead()
    {
        $dataAll = $this->model->getAdeptheadJo();
        echo json_encode($dataAll);
    }


    public function tampilaplanthead()
    {
        $dataAll = $this->model->getAplantheadJo();
        echo json_encode($dataAll);
    }


    //Menampilkan job order yang sudah di approved Plant head
    //Request Job Order
    public function aplanthead()
    {
        $data['title'] = 'App Plant Head';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/aplanthead', $data);
        $this->load->view('templates/footer');
    }

    public function tampilplanthead()
    {
        $dataAll = $this->model->getAplantheadJo();
        echo json_encode($dataAll);
    }

    public function afactoryhead()
    {
        $data['title'] = 'App Factory Head';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/afactoryhead', $data);
        $this->load->view('templates/footer');
    }

    public function tampilafactoryhead()
    {
        $dataAll = $this->model->getAfactoryheadJo();
        echo json_encode($dataAll);
    }
}
