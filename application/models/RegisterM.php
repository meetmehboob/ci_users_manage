<?php 
class RegisterM extends CI_Model {
	
	public function get_city_list($state_row_id)
	{	
		$this->db->limit(1);
		$this->db->where('id',$state_row_id);
		$state_query = $this->db->get('tbl_states')->row_array();
		$state_name = $state_query['state_name'];
		
		$this->db->where('state_name',$state_name);
		$query = $this->db->get('tbl_cities')->result_array();
		return $query;
	}


	public function get_users_experience_types()
	{
		$query = $this->db->get('tbl_users_experience_types')->result_array();
		return $query;
	}


	public function get_states()
	{
		$query = $this->db->get('tbl_states')->result_array();
		return $query;
	}


	public function get_users_job_types()
	{
		$query = $this->db->get('tbl_users_job_types')->result_array();
		return $query;
	}


	public function save_n_register_user()
	{	
		$date_only = date('Y-m-d');
		$date_n_time =  date('Y-m-d H:i:s');
		$login_status = 1;

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
		$password = $this->input->post('password');

		
		$full_name_array = explode(' ',$full_name);
		$first_element = $full_name_array[0];
		$full_name_filter = preg_match("/^[a-zA-Z0-9]", $first_element);
		if(strlen($full_name_filter) >= 4) 
		{
			$username = $first_element;
		}
		else
		{	
			$second_element = '';
			if(!empty($full_name_array[1])) 
			{
				$second_element = preg_match("/^[a-zA-Z0-9]", $full_name_array[1]);
			}
			$username = $first_element.$second_element;

			if($username < 4)
			{
				$username = $username.rand(10000,99999);
			}
		}

		$this->db->like('username',$username);
		$username_present_count  = $this->db->count_all_results('tbl_users');
		$username = $username.$username_present_count;


					
		$insert_array = array('gender_type'=>$gender_type, 'full_name'=>$full_name, 'username'=>$username, 'mobile_number'=>$mobile_number, 'email_id'=>$email_id, 'state_row_id'=>$state_row_id, 'city_row_id'=>$city_row_id, 'pincode'=>$pincode, 'area_name'=>$area_name, 'job_row_id'=>$job_row_id, 'experience_row_id'=>$experience_row_id, 'password'=>$password, 'login_status'=>$login_status, 'date_only'=>$date_only, 'date_n_time'=>$date_n_time);

		$this->db->insert('tbl_users',$insert_array);
		$insert_id = $this->db->insert_id();

		$this->session->set_flashdata('alert_msg','Dear user registration has been completed successfully, Thank You!');

		$this->session->set_userdata('user_row_id', $insert_id);
		$this->session->set_userdata('user_mobile_number', $mobile_number);
		$this->session->set_userdata('user_full_name', $full_name);
		$this->session->set_userdata('user_email_id', $email_id);
		$this->session->set_userdata('state_row_id', $state_row_id);
		redirect('dashboard');
	}
	
}
?>