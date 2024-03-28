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
}
