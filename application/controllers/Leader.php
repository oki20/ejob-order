<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        login_cek();
        $this->load->model('leader_model', 'model');
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
        $this->load->view('leader/index', $data);
        $this->load->view('templates/footer');
    }

    public function joborder()
    {
        $data['title'] = 'Master Job Order';
        $data['user'] = $this->db->get_where('member', ['id' => $this->session->userdata('id')])->row_array();
        $data['anggota'] = $this->model->getAnggota();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('leader/joborder', $data);
        $this->load->view('templates/footer');
    }

    public function tampiljo()
    {
        $dataAll = $this->model->getJo();
        echo json_encode($dataAll);
    }

    public function tampilanggota()
    {
        $dataAll = $this->model->getAnggota();
        echo json_encode($dataAll);
    }

    public function tambahanggota()
    {
        $id = $this->session->userdata('id');

        $data = array(
            'id_member' => $id,
            'nama_member' => $this->input->post('nama_member'),
            'nim_member' => $this->input->post('nim_member')
        );

        $simpantData = $this->model->simpanAnggota($data);
        // Cek apakah data berhasil tersimpan
        if ($simpantData) {
            echo json_encode(array('status' => 'success'));
        } else {
            echo json_encode(array('status' => 'error'));
        }
    }

    public function createreport()
    {
        $bagian = $this->session->userdata('bagian');
        $progres_elektrik = null;
        $progres_mekanik = null;

        // Perbaikan: Gunakan operator perbandingan '==' bukan assignment '='
        if ($bagian == 'Elektrik') {
            $progres_elektrik = $this->input->post('progres');
        } elseif ($bagian == 'Mekanik') { // Perbaikan: Gunakan elseif untuk pengecekan berikutnya
            $progres_mekanik = $this->input->post('progres');
        }

        $tgl = $this->input->post('tgl_pengerjaan');
        $tim_pekerja = $this->input->post('tim_pekerja');
        $item_pekerjaan = $this->input->post('item_pekerjaan');
        $keterangan = $this->input->post('keterangan');
        $tim_absen = $this->input->post('tim_absen');
        $id_edit = $this->input->post('id_edit');

        $data = array(
            'id_jo' => htmlspecialchars($id_edit, true),
            'tgl_pengerjaan' => htmlspecialchars($tgl, true),
            'progres_elektrik' => htmlspecialchars($progres_elektrik, true),
            'progres_mekanik' => htmlspecialchars($progres_mekanik, true),
            'tim_pekerja' => htmlspecialchars($tim_pekerja, true),
            'item_pekerjaan' => htmlspecialchars($item_pekerjaan, true),
            'keterangan' => htmlspecialchars($keterangan, true),
            'tim_absen' => htmlspecialchars($tim_absen, true),
        );

        // Ambil progres sebelumnya
        $previous_progress = $this->model->getPreviousProgress($id_edit); // Anda perlu menyesuaikan ini dengan nama metode Anda

        // Bandingkan dengan progres yang baru diinputkan
        if ($bagian == 'Elektrik') {
            // Jika progres elektrik sebelumnya lebih besar dari progres yang baru diinputkan
            if ($previous_progress['progres_elektrik'] >= $this->input->post('progres')) {
                // Berikan pesan kesalahan kepada pengguna
                echo json_encode(['status' => 'error', 'message' => 'Progres Elektrik harus lebih besar dari progres sebelumnya']);
                return;
            }
        } elseif ($bagian == 'Mekanik') {
            // Jika progres mekanik sebelumnya lebih besar dari progres yang baru diinputkan
            if ($previous_progress['progres_mekanik'] >= $this->input->post('progres')) {
                // Berikan pesan kesalahan kepada pengguna
                echo json_encode(['status' => 'error', 'message' => 'Progres Mekanik harus lebih besar dari progres sebelumnya']);
                return;
            }
        }


        $simpanData = $this->model->addReport($data);

        if ($simpanData) {
            echo json_encode(['status' => 'success']);
        } else {
            echo json_encode(['status' => 'error']);
        }
    }
}
