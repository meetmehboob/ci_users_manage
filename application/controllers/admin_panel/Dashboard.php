<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admi32n_ma4nager_con45trol_panel/DashboardM');
		if(!$this->session->userdata('admin_manage_row_id') || !$this->session->userdata('admin_manage_full_name')  || !$this->session->userdata('admin_manage_login_id')) 
		{
			redirect(base_url('admi32n_ma4nager_con45trol_panel/login'));
		}

	}

	public function index()
	{
		$data[] = '';
		$data['overview'] = $this->DashboardM->overview();
		$this->load->view('admi32n_ma4nager_con45trol_panel/dashboard', $data);
	}
}
?>