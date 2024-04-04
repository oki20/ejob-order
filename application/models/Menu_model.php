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


    //Model untuk menampilkan master data user
    public function getUser()
    {
        return $this->db->get_where('user')->result_array();
    }


    // Model untuk menampilkan request Job Order (User)
    public function getRequestJo()
    {
        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '1')
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
}
