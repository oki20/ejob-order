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
        $currentYear = date('Y');

        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            //->where('status', 5)
            ->where("YEAR(tgl_terima) =", $currentYear)
            ->get()
            ->row_array();
    }

    //Dashboard Admin
    public function getTotalJoProgres()
    {
        $currentYear = date('Y');

        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 5)
            ->where("YEAR(tgl_terima) =", $currentYear)
            ->get()
            ->row_array();
    }

    //Dashboard Admin
    public function getTotalJoYear()
    {
        $currentYear = date('Y');

        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 10)
            ->where("YEAR(tgl_terima) =", $currentYear)
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

    //Dashboard admin menampilkan jumlah JO JEM
    public function getTotJoJem()
    {
        // Ensure the substring is safe and properly formatted for the query
        $safe_substring = $this->db->escape_like_str('98800');

        $this->db->select('COUNT(no_jo) as total_jo');
        $this->db->from('pengajuan_job_order');
        $this->db->like('no_jo', $safe_substring); // WHERE `no_jo` LIKE '%substring%'

        $query = $this->db->get();
        $result = $query->row_array();

        return $result;
    }

    //Dashboard admin menampilkan jumlah JO tahun sebelumnya
    public function getTotJoBefore()
    {
        $currentYear = date('Y', strtotime('-1 year'));

        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 5)
            ->where("YEAR(tgl_terima) =", $currentYear)
            ->get()
            ->row_array();
    }

    public function getWaitingApproveJo()
    {
        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where_in('status', [1, 2, 3, 4])
            ->get()
            ->row_array();
    }

    public function get_jo($id_jo)
    {
        $this->db->where('id', $id_jo);
        $this->db->where('status', 1);
        $query = $this->db->get('pengajuan_job_order'); // Ganti 'job_order' dengan nama tabel yang sesuai
        return $query->row_array(); // Mengembalikan hasil sebagai array
    }

    public function get_jop($id_jo)
    {
        // Pilih kolom yang dibutuhkan dari tabel pengajuan_job_order, user, dan dh_update_log
        $this->db->select('
        pengajuan_job_order.*, 
        user.name as depthead_name, 
        dh_update_log.updated_at as last_updated_at');

        // Lakukan join antara pengajuan_job_order, user, dan dh_update_log
        $this->db->from('pengajuan_job_order');
        $this->db->join('user', 'pengajuan_job_order.id_depthead = user.id', 'left');
        $this->db->join('dh_update_log', 'pengajuan_job_order.id = dh_update_log.id_job_order', 'left');

        // Tentukan kondisi berdasarkan id_jo dan status
        $this->db->where('pengajuan_job_order.id', $id_jo);
        $this->db->where('pengajuan_job_order.status', 2);

        // Eksekusi query dan kembalikan hasilnya
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan hasil sebagai array
    }


    public function get_jof($id_jo)
    {
        // Pilih kolom dari pengajuan_job_order dan nama dari user untuk depthead dan planthead, serta log update
        $this->db->select('
        pengajuan_job_order.*, 
        user_depthead.name as depthead_name, 
        user_planthead.name as planthead_name,
        dh_log.updated_at as last_updated_at,
        ph_log.updated_at as ph_last_updated_at
    ');

        // Dari tabel pengajuan_job_order
        $this->db->from('pengajuan_job_order');

        // Join pertama: untuk mengambil nama depthead
        $this->db->join('user as user_depthead', 'pengajuan_job_order.id_depthead = user_depthead.id', 'left');

        // Join kedua: untuk mengambil nama planthead
        $this->db->join('user as user_planthead', 'pengajuan_job_order.id_planthead = user_planthead.id', 'left');

        // Join ketiga: untuk log update depthead
        $this->db->join('dh_update_log as dh_log', 'pengajuan_job_order.id = dh_log.id_job_order', 'left');

        // Join keempat: untuk log update planthead
        $this->db->join('dh_update_log as ph_log', 'pengajuan_job_order.id = ph_log.id_job_order', 'left');

        // Kondisi berdasarkan id dan status
        $this->db->where('pengajuan_job_order.id', $id_jo);
        $this->db->where('pengajuan_job_order.status', 11);

        // Eksekusi query dan kembalikan hasil sebagai array
        $query = $this->db->get();
        return $query->row_array(); // Mengembalikan sebagai array
    }

    public function getJoPerMonth()
    {
        // Mendapatkan tanggal 20 bulan ini
        $currentDate = date('Y-m-20');
        // Mendapatkan tanggal 20 bulan sebelumnya
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

    public function getJoFinishPerMonth()
    {
        // Mendapatkan tanggal 20 bulan ini
        $currentDate = date('Y-m-20');
        // Mendapatkan tanggal 20 bulan sebelumnya
        $previousMonthDate = date('Y-m-20', strtotime('-1 month'));

        return $this->db
            ->select('COUNT(no_jo) as total_jo')
            ->from('pengajuan_job_order')
            ->where('status', 10)
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

    public function deleteuser($id)
    {
        $this->db->where('id', $id);
        $result = $this->db->delete("user");

        return $result;
    }

    //Model untuk tambah member
    public function addMember($data)
    {
        return $this->db->insert("member", $data);
    }

    public function getMember()
    {
        $query = "SELECT m.*, GROUP_CONCAT(p.nama) AS name_plant 
              FROM member m 
              JOIN tb_plant p ON FIND_IN_SET(p.id_plant, m.plant) > 0 
              WHERE FIND_IN_SET(p.id_plant, m.plant) > 0 
              GROUP BY m.id";

        return $this->db->query($query)->result_array();
    }

    public function getAdmin()
    {
        return $this->db
            ->select('*')
            ->from('user')
            ->where('user.role_id', 1)
            ->get()
            ->result_array();
    }

    //Model untuk menampilkan data dept head
    public function getDh()
    {
        //return $this->db->get_where('user')->result_array();
        return $this->db
            ->select('*')
            ->from('user')
            ->join('tb_plant', 'user.id_plant = tb_plant.id_plant')
            ->where('user.role_id', 3)
            ->get()
            ->result_array();
    }

    //Model untuk menampilkan data dept head
    public function getPh()
    {
        //return $this->db->get_where('user')->result_array();
        return $this->db
            ->select('*')
            ->from('user')
            ->join('tb_plant', 'user.id_plant = tb_plant.id_plant')
            ->where('user.role_id', 4)
            ->get()
            ->result_array();
    }

    //Model untuk menampilkan master data user
    public function getUser()
    {
        //return $this->db->get_where('user')->result_array();
        return $this->db
            ->select('*')
            ->from('user')
            ->join('tb_plant', 'user.id_plant = tb_plant.id_plant')
            ->where_in('user.role_id', [1, 2, 3, 4])
            ->get()
            ->result_array();
    }

    public function getLead()
    {
        return $this->db
            ->select('*')
            ->from('user')
            ->where_in('role_id', [5, 6, 7, 8]) // Menggunakan where_in untuk mencocokkan beberapa nilai
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

    public function updateJobOrder($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengajuan_job_order', $data);
    }

    public function updateSubmenu($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('user_sub_menu', $data);
    }

    // Model untuk menampilkan request Job Order (User)
    public function getRequestJo()
    {
        $id = $this->session->userdata('id');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            //->where('pengajuan_job_order.status', '1')
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
        $this->db->insert("pengajuan_job_order", $data);
        return $this->db->insert_id();
    }

    public function saveDh($data)
    {
        return $this->db->insert("user", $data);
    }

    public function checkNimExists($nim)
    {
        $this->db->where('nim', $nim);
        $query = $this->db->get('user'); // replace 'your_table_name' with your actual table name
        if ($query->num_rows() > 0) {
            return true; // NIM exists
        } else {
            return false; // NIM does not exist
        }
    }

    public function checkEmailExists($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('user'); // replace 'your_table_name' with your actual table name
        if ($query->num_rows() > 0) {
            return true; // Email exists
        } else {
            return false; // Email does not exist
        }
    }

    public function chekDuplikatJo($no_jo)
    {
        $this->db->where('no_jo', $no_jo);
        $query = $this->db->get('pengajuan_job_order'); // replace '
        if ($query->num_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function update_data($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengajuan_job_order', $data);
    }

    public function receiveData($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengajuan_job_order', $data);
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

        $requestStatus = [2, 3, 4];

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where_in('pengajuan_job_order.status', $requestStatus)
            ->where('pengajuan_job_order.id_pemesan', $id)
            ->get()
            ->result_array();
    }

    public function getAplantheadJo()
    {
        $id = $this->session->userdata('id');

        $requestStatus = [3, 4];

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where_in('pengajuan_job_order.status', $requestStatus)
            ->where('pengajuan_job_order.id_pemesan', $id)
            ->get()
            ->result_array();
    }

    public function getAfactoryheadJo()
    {
        $id = $this->session->userdata('id');

        $requestStatus = [4, 5];

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where_in('pengajuan_job_order.status', $requestStatus)
            ->where('pengajuan_job_order.id_pemesan', $id)
            ->get()
            ->result_array();
    }

    public function saveRole($data)
    {
        return $this->db->insert("user_role", $data);
    }

    public function getRejectJoUser()
    {
        $id = $this->session->userdata('id_plant');

        $rejectId = [6, 7, 8, 9];

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where_in('pengajuan_job_order.status', $rejectId)
            ->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function getRejectJo()
    {
        $id = $this->session->userdata('id_plant');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where_in('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function getRequestJo1()
    {
        $id = $this->session->userdata('id_plant');
        $id_depthead = $this->session->userdata('id');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '1')
            ->where('pengajuan_job_order.id_plant', $id)
            ->where('pengajuan_job_order.id_depthead', $id_depthead)
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
            //->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }
    public function getRequestJo4()
    {
        $id = $this->session->userdata('id_plant');

        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '4')
            //->where('pengajuan_job_order.id_plant', $id)
            ->get()
            ->result_array();
    }

    public function getJoStatus4()
    {
        return $this->db
            ->select('*')
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant')
            ->where('pengajuan_job_order.status', '4')
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


    public function getSubmenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }

    public function getMemberById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('member');
        return $query->row_array();
    }

    public function updateMember($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('member', $data);
    }

    public function getDataWa($dept_head)
    {
        $this->db->select('whatsapp'); // Assuming 'whatsapp' is the column name for WhatsApp number
        $this->db->from('user'); // Assuming 'user' is the table name
        $this->db->where('id', $dept_head); // Match with dept_head (ID of the department head)
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->whatsapp; // Return WhatsApp number
        } else {
            return false; // Return false if not found
        }
    }

    public function getWaFH()
    {
        $this->db->select('whatsapp'); // Assuming 'whatsapp' is the column name for WhatsApp number
        $this->db->from('user'); // Assuming 'user' is the table name
        $this->db->where('role_id', 8); // Match with dept_head (ID of the department head)
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->whatsapp; // Return WhatsApp number
        } else {
            return false; // Return false if not found
        }
    }

    public function getIdPh($id)
    {
        $this->db->select('id_planthead');
        $this->db->where('id', $id);
        $query = $this->db->get('pengajuan_job_order');
        return $query->row('id_planthead'); // pastikan kolom yang diambil sesuai
    }

    public function getIdDh($nip)
    {
        $this->db->select('id');
        $this->db->from('user');
        $this->db->where('nim', $nip);
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->id; // Return id
        } else {
            return false; // Return false if not found
        }
    }

    public function validasiId($id_dh)
    {
        $this->db->select('*');
        $this->db->from('pengajuan_job_order');
        $this->db->where('id_depthead', $id_dh);
        $query = $this->db->get();

        // Cek apakah ada hasil yang cocok
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return false; // Jika tidak ada user yang cocok
        }
    }

    public function validasiIdP($id_ph)
    {
        $this->db->select('*');
        $this->db->from('pengajuan_job_order');
        $this->db->where('id_planthead', $id_ph);
        $query = $this->db->get();

        // Cek apakah ada hasil yang cocok
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return false; // Jika tidak ada user yang cocok
        }
    }

    public function validasiIdUser($nip)
    {
        if (empty($nip)) {
            return false; // NIP kosong, tidak perlu lanjutkan query
        }

        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('nim', $nip);
        $this->db->where('role_id', 8);
        $query = $this->db->get();

        // Cek apakah ada hasil yang cocok
        if ($query->num_rows() > 0) {
            return $query->row(); // Mengembalikan data user
        } else {
            return false; // Jika tidak ada user yang cocok
        }
    }

    //record waktu approval dari DH
    public function dhStatusLog($data)
    {
        return $this->db->insert('dh_update_log', $data);
    }

    public function phStatusLog($data)
    {
        return $this->db->insert('ph_update_log', $data);
    }

    public function getJobOrderById($id)
    {
        return $this->db
            ->select('pengajuan_job_order.*, tb_plant.nama') // Pilih kolom spesifik
            ->from('pengajuan_job_order')
            ->join('tb_plant', 'pengajuan_job_order.id_plant = tb_plant.id_plant', 'left') // Left join jika data tidak wajib ada
            ->where('pengajuan_job_order.id', $id)
            ->get()
            ->result_array(); // Ambil sebagai array
    }
}
