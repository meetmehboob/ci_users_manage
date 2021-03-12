<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Logout extends CI_Controller
{
	public function index()
	{
		$array_items = array('admin_manage_row_id', 'admin_manage_mobile_number', 'admin_manage_full_name', 'admin_manage_email_id', 'admin_manage_login_id');
		$this->session->unset_userdata($array_items);
		$this->session->set_flashdata('alert_msg','We hope to see you soon.');
		redirect(base_url('admi32n_ma4nager_con45trol_panel/login'));
	}
}
?>