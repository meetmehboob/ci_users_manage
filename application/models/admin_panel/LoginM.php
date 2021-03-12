<?php 
class LoginM extends CI_Model {
	
	public function save_n_login_user() 
	{
		$login_id = $this->input->post('login_id');
		$password = $this->input->post('password');

		$this->db->where('login_id',$login_id);
		$this->db->where('login_password',$password);
		$query = $this->db->get('tbl_admin');
		if($query->num_rows()) 
		{
			$query_run = $query->row_array();
			if($query_run['login_password'] == $password) 
			{			
				$this->session->set_userdata('admin_manage_row_id', $query_run['id']);
				$this->session->set_userdata('admin_manage_mobile_number', $query_run['mobile_number']);
				$this->session->set_userdata('admin_manage_full_name', $query_run['full_name']);
				$this->session->set_userdata('admin_manage_email_id', $query_run['email_id']);
				$this->session->set_userdata('admin_manage_login_id', $query_run['login_id']);
				redirect('admi32n_ma4nager_con45trol_panel/dashboard');
			}
		}
		$this->session->set_flashdata('alert_msg','Sorry, Invalid login credentials.');
		redirect(base_url('admi32n_ma4nager_con45trol_panel/login'));
	}
}
?>