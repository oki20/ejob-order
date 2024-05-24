<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leader_model extends CI_Model
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

        $query = $this->db->get();
        return $query->row_array();
    }

    public function getJo()
    {
        $data = $this->db->get_where('member', ['id' => $this->session->userdata('id')])->row_array();
        $plant_string = $data['plant']; // Dapatkan string plant dari data anggota yang sedang login

        // Ubah string plant menjadi array menggunakan explode
        $plant_array = explode(',', $plant_string);

        $this->db->select('*');
        $this->db->from('pengajuan_job_order');
        $this->db->where_in('id_plant', $plant_array); // Gunakan array plant untuk where_in
        $this->db->where('status', '5');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getAnggota()
    {
        return $this->db->get_where('member_plant')->result_array();
    }

    public function simpanAnggota($data)
    {
        return $this->db->insert("member_plant", $data);
    }

    public function addReport($data)
    {
        return $this->db->insert("tb_report", $data);
    }

    public function getPreviousProgress($id_jo)
    {
        // Ambil progres sebelumnya dari database berdasarkan ID job order
        $this->db->select('progres_elektrik, progres_mekanik');
        $this->db->where('id_jo', $id_jo);
        $query = $this->db->get('tb_report'); // Ganti 'nama_tabel_laporan' dengan nama tabel yang sesuai
        return $query->row_array(); // Kembalikan hasil dalam bentuk array
    }
}
