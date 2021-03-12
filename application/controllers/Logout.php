<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller
{

	public function index()
	{	
		 $this->DefaultM->update_active_report_logout();
		$array_items = array('user_row_id', 'user_mobile_number', 'active_report_insert_id', 'login_date_n_time', 'user_full_name', 'user_email_id', 'state_row_id');
		$this->session->unset_userdata($array_items);
		$this->session->set_flashdata('alert_msg','We hope to see you soon.');
		redirect(base_url('login'));
	}
}
?>