<?php 
class ProfileM extends CI_Model {
	
	public function user_profile_detail()
	{
		$user_row_id = $this->session->userdata('user_row_id');

		$this->db->limit(1);
		$this->db->where('id',$user_row_id);
		$query = $this->db->get('tbl_users')->row_array();

		return $query; 
	}


	public function save_n_change_password()
	{
		$user_row_id = $this->session->userdata('user_row_id');
		$password = $this->input->post('new_password');

		$this->db->where('id',$user_row_id);
		$this->db->set('password',$password);
		$query = $this->db->update('tbl_users');
		$this->session->set_flashdata('alert_msg','Your Login Password  has been changed successfully, Thank You!');
		redirect(current_url());
	}

	public function check_old_password($current_password)
	{	
		$user_row_id = $this->session->userdata('user_row_id');

		$this->db->where('id',$user_row_id);
		$this->db->where('password',$current_password);
		$query = $this->db->get('tbl_users');
		if($query->num_rows()) 
		{
			return true;
		}
		return false;
	}


	public function save_n_update_profile_detail() 
	{	
		$user_row_id = $this->session->userdata('user_row_id');

		$gender_type = $this->input->post('gender_type');
		$full_name = $this->input->post('full_name');
		$mobile_number = $this->input->post('mobile_number');
		$email_id = $this->input->post('email_id');
		$state_row_id = $this->input->post('state_row_id');
		$city_row_id = $this->input->post('city_row_id');
		$pincode = $this->input->post('pincode');
		$area_name = $this->input->post('area_name');
		$job_row_id = $this->input->post('job_row_id');
		$experience_row_id = $this->input->post('experience_row_id');
		
					
		$update_array = array('gender_type'=>$gender_type, 'full_name'=>$full_name, 'mobile_number'=>$mobile_number, 'email_id'=>$email_id, 'state_row_id'=>$state_row_id, 'city_row_id'=>$city_row_id, 'pincode'=>$pincode, 'area_name'=>$area_name, 'job_row_id'=>$job_row_id, 'experience_row_id'=>$experience_row_id);

		$this->db->where('id',$user_row_id);
		$this->db->update('tbl_users',$update_array);
		

		$this->session->set_flashdata('alert_msg','Your Profile details has been updated successfully.');

		$this->session->set_userdata('user_row_id', $insert_id);
		$this->session->set_userdata('user_mobile_number', $mobile_number);
		$this->session->set_userdata('user_full_name', $full_name);
		$this->session->set_userdata('user_email_id', $email_id);
		$this->session->set_userdata('state_row_id', $state_row_id);
		redirect('dashboard');
	}
	

}
?>