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
        $bagian = $this->session->userdata('bagian');
        $data = $this->db->get_where('member', ['id' => $this->session->userdata('id')])->row_array();
        $plant_string = $data['plant']; // Dapatkan string plant dari data anggota yang sedang login

        // Ubah string plant menjadi array menggunakan explode
        $plant_array = explode(',', $plant_string);

        // Subquery for latest report
        $latest_report_sql = "
            SELECT 
                tr.id_jo,
                tr.id_member,
                tr.tgl_pengerjaan,
                tr.progres,
                m.bagian,
                ROW_NUMBER() OVER (PARTITION BY tr.id_jo, m.bagian ORDER BY tr.tgl_pengerjaan DESC, tr.id DESC) AS row_num
            FROM 
                tb_report tr
            JOIN 
                member m ON tr.id_member = m.id
        ";

        // Main query
        $sql = "
            SELECT 
                pjo.id AS job_order_id,
                pjo.no_jo,
                pjo.tgl_terima,
                pjo.pekerjaan,
                pjo.pelaksana,
                pjo.no_file,
                pjo.golongan,
                pjo.status,
                COALESCE(lr_mekanik.progres, 0) AS progres_mekanik,
                COALESCE(lr_elektrik.progres, 0) AS progres_elektrik
            FROM 
                pengajuan_job_order pjo
            LEFT JOIN 
                (SELECT id_jo, progres FROM ($latest_report_sql) lr WHERE bagian = 'Mekanik' AND row_num = 1) lr_mekanik ON pjo.id = lr_mekanik.id_jo
            LEFT JOIN 
                (SELECT id_jo, progres FROM ($latest_report_sql) lr WHERE bagian = 'Elektrik' AND row_num = 1) lr_elektrik ON pjo.id = lr_elektrik.id_jo
            WHERE 
                pjo.id_plant IN (" . implode(',', array_map('intval', $plant_array)) . ")
                AND pjo.status = 5
            ORDER BY 
                pjo.id
        ";

        // Execute query
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function getAnggota()
    {
        $this->db->select('*');
        $this->db->from('member_plant');
        $this->db->where('id_member', $this->session->userdata('id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function getReport()
    {
        $id_member = $this->session->userdata('id');
        $this->db->select('*');
        $this->db->from('pengajuan_job_order');
        $this->db->join('tb_report', 'pengajuan_job_order.id = tb_report.id_jo');
        $this->db->where('tb_report.id_member', $id_member);
        $this->db->order_by('tb_report.id', 'DESC'); // Order by 'id' in descending order
        $query = $this->db->get();
        return $query->result_array();
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
        $this->db->select('progres');
        $this->db->where('id_jo', $id_jo);
        $query = $this->db->get('tb_report'); // Ganti 'nama_tabel_laporan' dengan nama tabel yang sesuai
        return $query->row_array(); // Kembalikan hasil dalam bentuk array
    }
}
