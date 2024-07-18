<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assistant_model extends CI_Model
{
    public function getDataJo()
    {
        $id = $this->session->userdata('id');

        $this->db->select('m.id, m.name, GROUP_CONCAT(tp.nama) AS plant_names, GROUP_CONCAT(tp.id_plant) AS plant_ids');
        $this->db->from('member m');
        $this->db->join('tb_plant tp', 'FIND_IN_SET(tp.id_plant, REPLACE(REPLACE(m.plant, "[", ""), "]", ""))');
        $this->db->where('m.id', $id);
        $this->db->group_by('m.id, m.name');

        $query = $this->db->get();
        return $query->row_array();
    }


    public function get_total_job_orders($plant_id)
    {
        // Query untuk mendapatkan total job orders per plant
        $this->db->select('COUNT(*) AS total_jo');
        $this->db->from('pengajuan_job_order');
        $this->db->where('id_plant', $plant_id);
        $this->db->where('status', '5');
        $this->db->where('no_file <>', '');

        $query = $this->db->get();
        return $query->row_array();
    }

    public function getInformasi()
    {
        $id_member = $this->session->userdata('id');

        $this->db->select(
            'tb_informasi.*,
            tb_plant.nama,
            tb_report_informasi.progres
            '
        );
        $this->db->from('tb_informasi');
        $this->db->join('tb_plant', 'tb_informasi.id_plant = tb_plant.id_plant', 'left');
        $this->db->join('tb_report_informasi', 'tb_informasi.no_info = tb_report_informasi.id_info', 'left');
        $this->db->where('tb_informasi.id_user', $id_member);

        $query = $this->db->get();
        return $query->result_array();
    }

    public function saveInformation($data)
    {
        return $this->db->insert('tb_informasi', $data);
    }

    public function updateInformation($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('tb_informasi', $data);
    }

    public function deleteInformation($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('tb_informasi');
    }

    public function getLastIdInfo()
    {
        $query = $this->db->order_by('no_info', 'DESC')->limit(1)->get('tb_informasi');
        if ($query->num_rows() > 0) {
            return $query->row()->no_info;
        } else {
            return null;
        }
    }
}
