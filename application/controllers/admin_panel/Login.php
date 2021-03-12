<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admi32n_ma4nager_con45trol_panel/LoginM');
		if(!empty($this->session->userdata('admin_manage_row_id')) && !empty($this->session->userdata('admin_manage_full_name')) && !empty($this->session->userdata('admin_manage_login_id'))) 
		{
			redirect(base_url('admi32n_ma4nager_con45trol_panel/dashboard'));
		}



	}

	public function index()
	{
		$data[] = '';
		if(isset($_POST['save_n_login_user'])) 
	 	{
		 		$this->form_validation->set_rules('login_id', 'email id or mobile number', 'trim|required');
			    $this->form_validation->set_rules('password', 'password', 'trim|required');
			    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			    if($this->form_validation->run())
			    {
			        $run = $this->LoginM->save_n_login_user();
			    }
	 	}
		

		
		$this->load->view('admi32n_ma4nager_con45trol_panel/login', $data);
	}
}
?>