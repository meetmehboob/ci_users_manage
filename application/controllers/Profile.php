<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Profile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProfileM');
		if(!$this->session->userdata('user_row_id') || !$this->session->userdata('user_mobile_number')  || !$this->session->userdata('user_full_name')) 
		{
			redirect(base_url('login'));
		}

	}


	public function index()
	{
		$data[] = '';
		$data['user_profile_detail'] = $this->ProfileM->user_profile_detail();

		if(isset($_POST['save_n_change_password'])) 
	 	{
		 		$this->form_validation->set_rules('current_password', 'current password', 'trim|required|callback_check_old_password');
			    $this->form_validation->set_rules('new_password', 'new password', 'trim|requiredcallback_check_new_password');
			    $this->form_validation->set_rules('confirm_password', 'confirm new password', 'trim|required');
			    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			    if($this->form_validation->run())
			    {
			        $run = $this->ProfileM->save_n_change_password();
			    }
	 	}


	 	if(isset($_POST['save_n_update_profile_detail'])) 
	 	{
		 		$this->form_validation->set_rules('current_password', 'current password', 'trim|required|callback_check_old_password');
			    $this->form_validation->set_rules('new_password', 'new password', 'trim|requiredcallback_check_new_password');
			    $this->form_validation->set_rules('confirm_password', 'confirm new password', 'trim|required');
			    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
			    if($this->form_validation->run())
			    {
			        $run = $this->ProfileM->save_n_update_profile_detail();
			    }
	 	}

		$this->load->view('profile', $data);
	}

	public function check_old_password($current_password) 
	{
		$run = $this->ProfileM->check_old_password($current_password);
		if(!$run)
		{
			$this->form_validation->set_message('check_old_password', 'The %s is not matching.');
            return FALSE;
		} 
		return TRUE;
	}


	public function check_new_password($current_password) 
	{
		$run = $this->ProfileM->check_old_password($current_password);
		if($run)
		{
			$this->form_validation->set_message('check_new_password', 'The New password cannot be your current password.');
            return FALSE;
		} 
		return TRUE;
	}




}
?>