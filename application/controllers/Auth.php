<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('menu_model', 'model');
    }

    public function index()
    {
        if ($this->session->userdata('id')) {
            redirect('user');
        }

        $this->form_validation->set_rules('nim', 'NIP', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login Page';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // validasinya success
            $this->_login();
            //$this->send_email();
        }
    }


    private function _login()
    {
        $nim = $this->input->post('nim');
        $password = $this->input->post('password');

        // Cek di tabel 'user'
        $user = $this->db->get_where('user', ['nim' => $nim])->row_array();

        if ($user) {
            // Cek apakah user aktif
            if ($user['is_active'] == 1) {
                // Verifikasi password
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id'],
                        'id_plant' => $user['id_plant'],
                        'id' => $user['id']
                    ];
                    $this->session->set_userdata($data);
                    // Redirect berdasarkan role_id
                    switch ($user['role_id']) {
                        case 1:
                            redirect('admin');
                            break;
                        case 8:
                            redirect('member');
                            break;
                        default:
                            redirect('user');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">This NIP has not been activated!</div>');
                redirect('auth');
            }
        } else {
            // Cek di tabel 'member'
            $member = $this->db->get_where('member', ['nim' => $nim])->row_array();
            if ($member) {
                if (password_verify($password, $member['password'])) {
                    $data = [
                        'email' => $member['email'],
                        'jabatan' => $member['jabatan'],
                        'plant' => $member['plant'],
                        'id' => $member['id'],
                        'role_id' => $member['role_id'],
                        'bagian' => $member['bagian'],
                        'no_hp' => $member['no_hp']
                    ];
                    $this->session->set_userdata($data);
                    // Redirect berdasarkan jabatan
                    switch ($member['jabatan']) {
                        case 'L':
                            redirect('leader');
                            break;
                        case 'SH':
                            redirect('section');
                            break;
                        case 'ADH':
                            redirect('assistant');
                            break;
                        default:
                            redirect('auth');
                            break;
                    }
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong password!</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIP is not registered!</div>');
                redirect('auth');
            }
        }
    }



    public function registration()
    {
        if ($this->session->userdata('id')) {
            redirect('user');
        }

        //get Data Plant
        $data['plants'] = $this->model->getPlant();

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'required|trim|is_unique[user.whatsapp]', [
            'is_unique' => 'This number has already registered!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|is_unique[user.email]|callback_check_email_domain', [
            'is_unique' => 'This Email has already registered!'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password dont match!',
            'min_length' => 'Password too short!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');
        $this->form_validation->set_rules('nim', 'NIP', 'required|trim');
        $this->form_validation->set_rules('departemen', 'Departemen', 'required|trim');
        $this->form_validation->set_rules('plant', 'Plant', 'required|trim');
        $this->form_validation->set_rules('role_id', 'Role', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'e-JOB Order User Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $whatsapp = $this->input->post('whatsapp', true);
            $name = htmlspecialchars($this->input->post('name', true));
            $data = [
                'name' => htmlspecialchars($this->input->post('name', true)),
                'whatsapp' => htmlspecialchars($whatsapp),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => htmlspecialchars($this->input->post('role_id', true)),
                'is_active' => 0,
                'date_created' => time(),
                'nim' => htmlspecialchars($this->input->post('nim', true)),
                'id_plant' => htmlspecialchars($this->input->post('plant', true)),
                'departemen' => htmlspecialchars($this->input->post('departemen', true))
            ];

            // siapkan token
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'whatsapp' => $whatsapp,
                'token' => $token,
                'date_created' => time()
            ];

            //script untuk simpan data ke table user
            $this->db->insert('user', $data);
            //script untuk simpan token ke table user_token
            $this->db->insert('user_token', $user_token);

            //$this->_sendWhatsapp($token, $name, 'verify');
            $this->send_email($token, $name, 'verify');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please activate your account</div>');
            redirect('auth');
        }
    }

    public function check_email_domain($email)
    {
        // Memeriksa apakah alamat email sesuai dengan domain yang diinginkan
        if (strpos($email, '@gt-tires.com') === FALSE) {
            $this->form_validation->set_message('check_email_domain', 'The email must belong to gt-tires.com domain');
            return FALSE;
        } else {
            return TRUE;
        }
    }

    /*private function _sendWhatsapp($token, $name, $type)
    {
        if ($type == 'verify') {
            $url = base_url() . 'auth/verify?whatsapp=' . $this->input->post('whatsapp') . '&token=' . urlencode($token);
            $shortLink = json_decode(shortenLink($url));
            $requestBody = [
                "target"    => '0' . substr($this->input->post('whatsapp'), 2),
                "message"   => "*Activate Your E-Job Order Account!* \n\nHi " . $name . ", \nThank you for registering. Please click here to activate your account: \n\n" . $shortLink->shrtlnk . "\n\nCheers,\n*E-Job Administrator*",
                "typing"    => true
            ];
        } else if ($type == 'forgot') {
            $url = base_url() . 'auth/resetpassword?whatsapp=' . $this->input->post('whatsapp') . '&token=' . urlencode($token);
            $shortLink = json_decode(shortenLink($url));
            $requestBody = [
                "target"    => '0' . substr($this->input->post('whatsapp'), 2),
                "message"   => "*E-Job Order Password Reset!* \n\nHi " . $name . ", \nWe received your password reset request. Please click here to set a new password: \n\n" . $shortLink->shrtlnk . "\n\nCheers,\n*E-Job Administrator*",
                "typing"    => true
            ];
        }
        $send = postWhatsappApi('send', $requestBody);
        $send = json_decode($send, true);

        if ($send['status']) {
            return true;
        } else {
            echo $send['reason'];
            die;
        }
    }*/

    public function verify()
    {
        $whatsapp = $this->input->get('whatsapp');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['whatsapp' => $whatsapp])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    $this->db->set('is_active', 1);
                    $this->db->where('whatsapp', $whatsapp);
                    $this->db->update('user');

                    $this->db->delete('user_token', ['whatsapp' => $whatsapp]);

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Account has been activated! Please login.</div>');
                    redirect('auth');
                } else {
                    $this->db->delete('user', ['whatsapp' => $whatsapp]);
                    $this->db->delete('user_token', ['whatsapp' => $whatsapp]);

                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Token expired.</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Account activation failed! Wrong number.</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
        redirect('auth');
    }


    public function blocked()
    {
        $this->load->view('auth/blocked');
    }


    public function forgotPassword()
    {
        $this->form_validation->set_rules('whatsapp', 'Whatsapp', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Forgot Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth_footer');
        } else {
            $whatsapp = $this->input->post('whatsapp');
            $user = $this->db->get_where('user', ['whatsapp' => $whatsapp, 'is_active' => 1])->row_array();


            if ($user) {
                $name = $user['name'];
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'whatsapp' => $whatsapp,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendWhatsapp($token, $name, 'forgot');

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Please check your whatsapp to reset your password!</div>');
                redirect('auth/forgotpassword');
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Number is not registered or activated!</div>');
                redirect('auth/forgotpassword');
            }
        }
    }


    public function resetPassword()
    {
        $whatsapp = $this->input->get('whatsapp');
        $token = $this->input->get('token');
        $user = $this->db->get_where('user', ['whatsapp' => $whatsapp])->row_array();


        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $whatsapp);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong token.</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Reset password failed! Wrong email.</div>');
            redirect('auth');
        }
    }


    public function changePassword()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[3]|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[3]|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Change Password';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/change-password');
            $this->load->view('templates/auth_footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $whatsapp = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('whatsapp', $whatsapp);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['whatsapp' => $whatsapp]);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password has been changed! Please login.</div>');
            redirect('auth');
        }
    }
    
    public function send_email($token, $name, $type) {
        // Load library email
        $this->load->library('email');

        // Email sender dan receiver
        $from = 'admin@instalasi.my.id'; // Ganti dengan email Anda
        $to = 'sardiko20@gmail.com'; // Tujuan pengiriman email
        $subject = 'Aktivasi Akun';
            if ($type == 'verify') {
                $url = base_url() . 'auth/verify?whatsapp=' . $this->input->post('whatsapp') . '&token=' . urlencode($token);
                $shortLink = json_decode(shortenLink($url));
                $message  = "*Activate Your E-Job Order Account!* \n\nHi " . $name . ", \nSilahkan klik link dibawah ini untuk melakukan aktifasi akun: \n\n" . $shortLink->shrtlnk . "\n\nCheers,\n*E-Job Administrator*";

            } else if ($type == 'forgot') {
                $url = base_url() . 'auth/resetpassword?whatsapp=' . $this->input->post('whatsapp') . '&token=' . urlencode($token);
                $shortLink = json_decode(shortenLink($url));
                $message  = "*E-Job Order Password Reset!* \n\nHi " . $name . ", \nSilahkan klik link dibawah ini untuk mengatur ulang kata sandi baru: \n\n" . $shortLink->shrtlnk . "\n\nCheers,\n*E-Job Administrator*";

            }
        

        // Set pengaturan email
        $this->email->from($from, 'Admin');
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);

        // Mengirim email dan menangani error jika gagal
        if ($this->email->send()) {
            echo 'Pesan email sudah terkirim.';
        } else {
            // Menampilkan pesan error jika pengiriman gagal
            echo 'Pengiriman email gagal.';
            echo $this->email->print_debugger();
        }
    }
}
