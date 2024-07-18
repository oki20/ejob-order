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

    public function laporan()
    {
        $data['title'] = 'Laporan Harian';
        $data['user'] = $this->db->get_where('user', ['id' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('joborder/laporan', $data);
        $this->load->view('templates/footer');
    }

    public function tampiljoplant($id)
    {
        $dataAll = $this->jomodel->getDataJo($id);
        echo json_encode($dataAll);
    }

    public function tampilreport()
    {
        $dataAll = $this->jomodel->getReportData();
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

    public function exportToExcel()
    {
        $start_date = $this->input->get('start_date');
        $end_date = $this->input->get('end_date');

        $sql = "
        SELECT 
            tr.id AS report_id,
            tr.id_jo,
            tr.id_member,
            tr.tgl_pengerjaan,
            tr.progres,
            tr.tim_pekerja,
            tr.item_pekerjaan,
            tr.keterangan,
            tr.tim_absen,
            pjo.no_jo,
            pjo.pekerjaan,
            pjo.tujuan,
            pjo.pelaksana,
            pjo.rencana,
            pjo.status,
            tp.nama,
            mb.bagian,
            GROUP_CONCAT(mp.nama_member ORDER BY mp.id SEPARATOR ', ') AS nama_member,
            GROUP_CONCAT(mp.nim_member ORDER BY mp.id SEPARATOR ', ') AS nim_member
        FROM 
            tb_report tr
        JOIN 
            pengajuan_job_order pjo ON tr.id_jo = pjo.id
        LEFT JOIN 
            member_plant mp ON FIND_IN_SET(mp.id, tr.tim_pekerja)
        LEFT JOIN 
            tb_plant tp ON pjo.id_plant = tp.id_plant
        LEFT JOIN
            member mb ON tr.id_member = mb.id
        WHERE 
            tr.tgl_pengerjaan BETWEEN ? AND ?
        GROUP BY 
            tr.id,
            tr.id_jo,
            tr.id_member,
            tr.tgl_pengerjaan,
            tr.progres,
            tr.tim_pekerja,
            tr.item_pekerjaan,
            tr.keterangan,
            tr.tim_absen,
            pjo.no_jo,
            pjo.pekerjaan,
            pjo.tujuan,
            pjo.pelaksana,
            pjo.rencana,
            pjo.status,
            tp.nama,
            mb.bagian
        ORDER BY 
            tr.id DESC
    ";

        // Execute query
        $query = $this->db->query($sql, array($start_date, $end_date));
        $data = $query->result_array();

        // File name
        $filename = 'report_data_' . date('Y-m-d_H-i-s') . '.csv';

        // Set headers to force download
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment;filename="' . $filename . '"');

        // Open PHP output stream
        $output = fopen('php://output', 'w');

        // Add header row
        fputcsv($output, array(
            'Tanggal Pengerjaan',
            'Bagian',
            'Plant',
            'Identitas Report',
            'Nomor Job Order',
            'Deskripsi Pekerjaan',
            'Aktivitas Pekerjaan',
            'Pelaksana',
            'Progres',
            'Tim Under Performance',
            'Keterangan'
        ));

        // Add data rows
        foreach ($data as $datum) {
            fputcsv($output, array(
                $datum['tgl_pengerjaan'],
                $datum['bagian'],
                $datum['nama'],
                'JO/EJO',
                $datum['no_jo'],
                $datum['pekerjaan'],
                $datum['item_pekerjaan'],
                $datum['nama_member'],
                $datum['progres'],
                $datum['tim_absen'],
                $datum['keterangan']
            ));
        }

        // Close the output stream
        fclose($output);
        exit;
    }
}
