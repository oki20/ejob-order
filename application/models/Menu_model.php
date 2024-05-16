<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
                  FROM `user_sub_menu` JOIN `user_menu`
                  ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
                ";
        return $this->db->query($query)->result_array();
    }

    //Dashboard Admin
    public function getTotalJo()
    {
        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 5)
            ->get()
            ->row_array();
    }

    //Dashboard Admin
    public function getWaitReceive()
    {
        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 4)
            ->get()
            ->row_array();
    }

    public function getJoPerMonth()
    {
        // Mendapatkan tanggal 15 bulan ini
        $currentDate = date('Y-m-15');
        // Mendapatkan tanggal 15 bulan sebelumnya
        $previousMonthDate = date('Y-m-15', strtotime('-1 month'));

        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 5)
            ->where("tgl_terima >= ", $previousMonthDate)
            ->where("tgl_terima < ", $currentDate)
            ->get()
            ->row_array();
    }

    //Model untuk master data plant
    public function getPlant()
    {
        return $this->db->get_where('tb_plant')->result_array();
    }

    public function save_data_plant($data)
    {
        return $this->db->insert("tb_plant", $data);
    }

    public function updateData($id_plant, $data)
    {
        $tableName = 'tb_plant';
        $primaryKey = 'id_plant';

        //update data
        $this->db->where($primaryKey, $id_plant);
        $this->db->update($tableName, $data);
    }

    public function deleteData($kode)
    {
        //hapus data dari tabel produksi
        $this->db->where('id_plant', $kode);
        $result = $this->db->delete("tb_plant");

        return $result;
    }

    //Model untuk tambah member
    public function addMember($data)
    {
        return $this->db->insert("member", $data);
    }

    public function getMember()
    {
        return $this->db->get_where('member')->result_array();
    }


    //Model untuk menampilkan master data user
    public function getUser()
    {
        //return $this->db->get_where('user')->result_array();
        return $this->db
            ->select('*')
            ->from('user')
            ->join('tb_plant', 'user.id_plant = tb_plant.id_plant')
            ->get()
            ->result_array();
    }

    //Model untuk menampilkan role
    public function getRole()
    {
        return $this->db->get_where('user_role')->result_array();
    }

    //Model untuk menampilkan menu
    public function getMenu()
    {
        return $this->db->get_where('user_menu')->result_array();
    }

    public function save_data_menu($data)
    {
        return $this->db->insert("user_menu", $data);
    }

    public function updateData_menu($id, $data)
    {
        $tableName = 'user_menu';
        $primaryKey = 'id';

        //update data
        $this->db->where($primaryKey, $id);
        $this->db->update($tableName, $data);
    }


    // Model untuk menampilkan request Job Order (User)
    public function getRequestJo()
    {
        $id = $this->session->userdata('id');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '1')
            ->where('pengajuan_job_order.id_pemesan', $id)
            ->get()
            ->result_array();
    }


    public function getDeptHeadid($plantId)
    {
        $this->db->select('*');
        $this->db->where('id_plant', $plantId);
        $this->db->where('role_id', 3); // Mengambil hanya user dengan role_id 3 (Departemen Head)
        $query = $this->db->get('user');
        return $query->result();
    }

    public function getPlantHeadid($plantId)
    {
        $this->db->select('*');
        $this->db->where('id_plant', $plantId);
        $this->db->where('role_id', 4); // Mengambil hanya user dengan role_id 3 (Departemen Head)
        $query = $this->db->get('user');
        return $query->result();
    }

    public function save_data($data)
    {
        return $this->db->insert("pengajuan_job_order", $data);
    }

    public function deleteRequest($id)
    {
        $this->db->select('lampiran');
        $this->db->where('id', $id);
        $query = $this->db->get('pengajuan_job_order');
        $row = $query->row();
        $lampiran = $row->lampiran;

        //hapus data dari tabel pengajuan_job_order
        $this->db->where('id', $id);
        $result = $this->db->delete('pengajuan_job_order');

        //hapus file lampira dari drive jika ada
        if ($result && !empty($lampiran)) {
            $destinationPath = './assets/lampiran/' . $lampiran;
            if (file_exists($destinationPath)) {
                unlink($destinationPath); // Hapus lampiran dari drive
            }
        }

        return $result;
    }

    public function getAdeptheadJo()
    {
        $id = $this->session->userdata('id');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '2')
            ->where('pengajuan_job_order.id_pemesan', $id)
            ->get()
            ->result_array();
    }

    public function getAplantheadJo()
    {
        $id = $this->session->userdata('id');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '3')
            ->where('pengajuan_job_order.id_pemesan', $id)
            ->get()
            ->result_array();
    }

    public function saveRole($data)
    {
        return $this->db->insert("user_role", $data);
    }

    public function getRequestJo1()
    {
        $id = $this->session->userdata('id_plant');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '1')
            ->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function getRequestJo2()
    {
        $id = $this->session->userdata('id_plant');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '2')
            ->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function getRequestJo3()
    {
        $id = $this->session->userdata('id_plant');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '3')
            ->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function appData($id, $data)
    {
        $tableName = 'pengajuan_job_order';
        $primaryKey = 'id';

        //update data
        $this->db->where($primaryKey, $id);
        $this->db->update($tableName, $data);
    }
}
