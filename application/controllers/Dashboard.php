<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model', 'model');
        $this->load->model('jo_model', 'jomodel');
        $this->load->model('leader_model', 'l_model');
    }

    public function index()
    {
        $data['totaljo'] = $this->model->getTotalJo();
        $data['totaljoprogres'] = $this->model->getTotalJoProgres();
        $data['totalyear'] = $this->model->getTotalJoYear();
        $data['receive'] = $this->model->getWaitReceive();
        $data['finish'] = $this->model->getJoFinishPerMonth();
        $data['month'] = $this->model->getJoPerMonth();
        $data['wait'] = $this->model->getWaitingApproveJo();
        $data['jem'] = $this->model->getTotJoJem();
        $data['totaljobefore'] = $this->model->getTotJoBefore();

        $data['plant'] = $this->jomodel->getDataPlant();
        $data['job'] = $this->l_model->MonitoringDash();

        $this->load->view('dashboard/index', $data);
    }
}
