<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Form extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('menu_model', 'model');
    }

    public function formjo($id)
    {
        $id_jo = $id;
        $data['title'] = 'Form Job Order';
        $data['jo'] = $this->model->get_jo($id_jo);

        // Jika data job order tidak ditemukan, berikan nilai default agar tidak error
        if (empty($data['jo'])) {
            $data['jo'] = array(
                'id' => '',       // Default nilai kosong untuk nomor job order
                'no_jo' => '',       // Default nilai kosong untuk nomor job order
                'tgl_jo' => '',      // Default nilai kosong untuk tanggal
                'cc_no' => '',       // Default nilai kosong untuk nomor CC
                'pekerjaan' => '',   // Default nilai kosong untuk pekerjaan
                'tujuan' => '',      // Default nilai kosong untuk tujuan
                'rencana' => '',     // Default nilai kosong untuk rencana
            );
        }

        $this->load->view('templates/header', $data);
        $this->load->view('joborder/formjo', $data);
        $this->load->view('templates/footer');
    }

    public function formjop($id)
    {
        $id_jo = $id;
        $data['title'] = 'Form Job Order';
        $data['jo'] = $this->model->get_jop($id_jo);

        // Jika data job order tidak ditemukan, berikan nilai default agar tidak error
        if (empty($data['jo'])) {
            $data['jo'] = array(
                'id' => '',       // Default nilai kosong untuk nomor job order
                'no_jo' => '',       // Default nilai kosong untuk nomor job order
                'tgl_jo' => '',      // Default nilai kosong untuk tanggal
                'cc_no' => '',       // Default nilai kosong untuk nomor CC
                'pekerjaan' => '',   // Default nilai kosong untuk pekerjaan
                'tujuan' => '',      // Default nilai kosong untuk tujuan
                'rencana' => '',     // Default nilai kosong untuk rencana
            );
        }

        $this->load->view('templates/header', $data);
        $this->load->view('joborder/formjop', $data);
        $this->load->view('templates/footer');
    }

    public function receivedata($id)
    {
        // Ambil NIP dari input
        $nip = $this->input->post('nip');

        // Untuk mendapatkan id plant head dari tabel pengajuan job order
        $id_ph = $this->model->getIdPh($id);

        // Mendapatkan id depthead dari nip di tabel user
        $id_dh = $this->model->getIdDh($nip);

        // Validasi id_dh dengan id_dh di pengajuan job order
        $user = $this->model->validasiId($id_dh);

        // Ambil nomor WhatsApp plant head dari table user.
        $ph_whatsapp = $this->model->getDataWa($id_ph);

        if ($user) {
            // Ambil pekerjaan dari field 'pekerjaan'
            $pekerjaan = $user->pekerjaan;

            // Update data status
            $data = array(
                'status' => 2
            );

            // Update data
            $updateData = $this->model->receivedata($id, $data);

            if ($updateData) {
                // Jika berhasil, buat pesan dan kirim via WhatsApp
                $url = base_url() . 'form/formjop/' . $id;
                $shortLink = json_decode(shortenLink($url));

                $requestBody = [
                    "target"    => '0' . substr($ph_whatsapp, 2),
                    "message"   => "*Informasi Pengajuan Job Order!* \n\n, \nBerikut Kami informasikan terkait pengajuan job order dengan Deskripsi sebagai berikut.\n\n*" . $pekerjaan . "* \n\nDetail informasi beserta persetujuan bisa klik link di bawah ini: \n\n" . $shortLink->shrtlnk . "\n\nCheers,\n*E-Job Administrator*",
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
        } else {
            // Jika NIP tidak valid
            echo json_encode(array('status' => 'error', 'message' => 'NIP tidak valid'));
        }
    }


    public function receivedatap($id)
    {
        //ambil nip dari input
        $nip = $this->input->post('nip');
        //mendapatkan id depthead dari nip di tabel user
        $id_ph = $this->model->getIdDh($nip);
        //validasi id_dh dengan id_dh di pengajuan job order
        $user = $this->model->validasiIdP($id_ph);

        if ($user) {
            $data = array(
                'status' => 3
            );

            //update data
            $updateData = $this->model->receivedata($id, $data);
            if ($updateData) {
                echo json_encode(array('status' => 'success', 'message' => 'Berhasil mengirimkan Pengajuan Job Order ke Plant Head Instalasi'));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            // Jika NIP tidak valid
            echo json_encode(array('status' => 'error', 'message' => 'NIP tidak valid'));
        }
    }

    public function rejectdata($id)
    {
        //ambil nip dari input
        $nip = $this->input->post('nip');
        $saran = $this->input->post('saran');
        //mendapatkan id depthead dari nip di tabel user
        $id_dh = $this->model->getIdDh($nip);

        //validasi id_dh dengan id_dh di pengajuan job order
        $user = $this->model->validasiId($id_dh);

        if ($user) {
            $data = array(
                'status' => 6,
                'saran_dept' => $saran
            );

            //update data
            $updateData = $this->model->receivedata($id, $data);
            if ($updateData) {
                echo json_encode(array('status' => 'success', 'message' => 'Job Order ini di tolak.'));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            // Jika NIP tidak valid
            echo json_encode(array('status' => 'error', 'message' => 'NIP tidak valid'));
        }
    }

    public function rejectdatap($id)
    {
        //ambil nip dari input
        $nip = $this->input->post('nip');
        $saran = $this->input->post('saran');
        //mendapatkan id depthead dari nip di tabel user
        $id_ph = $this->model->getIdDh($nip);
        //validasi id_dh dengan id_dh di pengajuan job order
        $user = $this->model->validasiIdP($id_ph);

        if ($user) {
            $data = array(
                'status' => 7,
                'saran_dept' => $saran
            );

            //update data
            $updateData = $this->model->receivedata($id, $data);
            if ($updateData) {
                echo json_encode(array('status' => 'success', 'message' => 'Job Order ini di tolak.'));
            } else {
                echo json_encode(array('status' => 'error'));
            }
        } else {
            // Jika NIP tidak valid
            echo json_encode(array('status' => 'error', 'message' => 'NIP tidak valid'));
        }
    }
}
