<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php'; // Load PHPSpreadsheet

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Fill;


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

        // Buat spreadsheet baru
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set properti dokumen
        $spreadsheet->getProperties()->setCreator("PT. Gajah Tunggal Tbk")
            ->setTitle("Laporan Harian")
            ->setDescription("Departemen Instalasi");

        foreach (range('A', 'K') as $columnID) {
            $sheet->getColumnDimension($columnID)->setWidth(12);
        }

        // Merge cells untuk header
        $sheet->mergeCells('A1:K1');
        $sheet->mergeCells('A2:K2');
        $sheet->mergeCells('A3:K3');
        $sheet->mergeCells('A4:K4');

        // Set header text
        $sheet->setCellValue('A1', 'PT. Gajah Tunggal Tbk');
        $sheet->setCellValue('A2', 'Departemen Instalasi');
        $sheet->setCellValue('A3', 'Laporan Harian');
        
        // Style header text
        $headerStyleArray = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
        ];
        $sheet->getStyle('A1')->applyFromArray($headerStyleArray);
        $sheet->getStyle('A2')->applyFromArray($headerStyleArray);
        $sheet->getStyle('A3')->applyFromArray($headerStyleArray);
    
        // Set header tabel
        $sheet->setCellValue('A5', 'Tanggal Pengerjaan');
        $sheet->setCellValue('B5', 'Bagian');
        $sheet->setCellValue('C5', 'Plant');
        $sheet->setCellValue('D5', 'Identitas Report');
        $sheet->setCellValue('E5', 'Nomor Job Order');
        $sheet->setCellValue('F5', 'Deskripsi Pekerjaan');
        $sheet->setCellValue('G5', 'Aktivitas Pekerjaan');
        $sheet->setCellValue('H5', 'Pelaksana');
        $sheet->setCellValue('I5', 'Progres (%)');
        $sheet->setCellValue('J5', 'Tim Under Performance');
        $sheet->setCellValue('K5', 'Keterangan');
        
        // Isi data
        $row = 6;
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $item['tgl_pengerjaan']);
            $sheet->setCellValue('B' . $row, $item['bagian']);
            $sheet->setCellValue('C' . $row, $item['nama']);
            $sheet->setCellValue('D' . $row, 'JO/EJO');
            $sheet->setCellValue('E' . $row, $item['no_jo']);
            $sheet->setCellValue('F' . $row, $item['pekerjaan']);
            $sheet->setCellValue('G' . $row, $item['item_pekerjaan']);
            $sheet->setCellValue('H' . $row, $item['nama_member']);
            $sheet->setCellValue('I' . $row, $item['progres']);
            $sheet->setCellValue('J' . $row, $item['tim_absen']);
            $sheet->setCellValue('K' . $row, $item['keterangan']);
            $row++;
        }
        
        // Set column widths
        foreach (range('A', 'K') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Add border to the cells
        $styleArray = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
            'alignment' => [
                'horizontal' => Alignment::HORIZONTAL_CENTER,
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ];

        $sheet->getStyle('A5:K' . ($row - 1))->applyFromArray($styleArray);


        // Save the spreadsheet to a file
        $filename = 'Laporan_Harian' . date('Ymd_His') . '.xlsx';

        // Output ke browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
        exit;
    }
}
