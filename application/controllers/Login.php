<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('LoginM');
		if(!empty($this->session->userdata('user_row_id')) && !empty($this->session->userdata('user_mobile_number')) && !empty($this->session->userdata('user_full_name'))) 
		{
			redirect(base_url('dashboard'));
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
		

		
		$this->load->view('login', $data);
	}
}
?>