<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Assistant extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        //is_logged_in();
        login_cek();
    }
}
