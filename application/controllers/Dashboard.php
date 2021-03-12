<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('DashboardM');

		if(!$this->session->userdata('user_row_id') || !$this->session->userdata('user_mobile_number')  || !$this->session->userdata('user_full_name')) 
		{
			redirect(base_url('login'));
		}
       
	}

	public function index()
	{

		$this->load->view('dashboard', $data);
	}

    
}
?>