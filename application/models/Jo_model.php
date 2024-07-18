<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jo_model extends CI_Model
{
    public function getDataPlant()
    {
        return $this->db
            ->select('COUNT(pengajuan_job_order.no_jo) as total_jo, tb_plant.id_plant, tb_plant.nama')
            ->from('tb_plant')
            ->join('pengajuan_job_order', 'pengajuan_job_order.id_plant = tb_plant.id_plant AND pengajuan_job_order.status = 5', 'left')
            ->group_by('tb_plant.id_plant, tb_plant.nama')
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
        /*return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '5')
            ->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();*/

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
            pjo.id_plant IN ($id)
            AND pjo.status = 5
            AND pjo.no_file <> ''
        ORDER BY 
            pjo.id
    ";

        // Execute query
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function save_data($data)
    {
        return $this->db->insert("pengajuan_job_order", $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengajuan_job_order', $data);
    }

    public function closeJob($id)
    {
        // Define the data array with the new status
        $data = array(
            'status' => '10'
        );
        // Ensure you have the correct table name
        $this->db->where('id', '16');
        $result = $this->db->update('pengajuan_job_order', $data);

        if (!$result) {
            log_message('error', 'Database error: ' . $this->db->error()['message']);
        }

        return $result;
    }

    public function getReportData()
    {
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
            pjo.no_file,
            GROUP_CONCAT(mp.nama_member SEPARATOR ', ') AS nama_tim_pekerja,
            GROUP_CONCAT(mp.nim_member SEPARATOR ', ') AS nim_tim_pekerja,
            plt.nama
        FROM 
            tb_report tr
        JOIN 
            pengajuan_job_order pjo ON tr.id_jo = pjo.id
        JOIN
            tb_plant plt ON pjo.id_plant = plt.id_plant
        LEFT JOIN 
            member_plant mp ON FIND_IN_SET(mp.id, tr.tim_pekerja) > 0
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
            pjo.no_file,
            plt.nama
        ORDER BY 
            tr.id DESC
    ";

        // Execute query
        $query = $this->db->query($sql);
        return $query->result_array();
    }
}
