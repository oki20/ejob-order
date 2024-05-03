<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jo_model extends CI_Model
{
    public function getDataPlant()
    {
        return $this->db
            ->select('COUNT(pengajuan_job_order.no_jo) as total_jo, tb_plant.id_plant, tb_plant.nama')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '5')
            ->get()
            ->result_array();
    }

    public function getPlant($id)
    {
        $this->db->where('id_plant', $id);
        $result = $this->db->get('tb_plant'); // You can directly pass the table name here

        return $result->row_array(); // Fetch a single row as an associative array
    }

    public function getDataJo($id)
    {
        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '5')
            ->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function save_data($data)
    {
        return $this->db->insert("pengajuan_job_order", $data);
    }
}
