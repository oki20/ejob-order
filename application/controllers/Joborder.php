<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Joborder extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('jo_model', 'model');
    }
}
