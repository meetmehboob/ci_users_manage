<?php 
class LoginM extends CI_Model {
	
	public function save_n_login_user() 
	{
		$login_id = $this->input->post('login_id');
		$password = $this->input->post('password');
		$date_only = date('Y-m-d');
		$date_n_time =  date('Y-m-d H:i:s');

		$this->db->limit(1);
		$this->db->where("(email_id = '$login_id' or mobile_number = '$login_id') and password = '$password'");
		$query = $this->db->get('tbl_users');
		if($query->num_rows()) 
		{
			$query_run = $query->row_array();
			if($query_run['password'] == $password) 
			{
				if($query_run['login_status'] == 1) 
				{
						$this->session->set_userdata('user_row_id', $query_run['id']);
						$this->session->set_userdata('user_mobile_number', $query_run['mobile_number']);
						$this->session->set_userdata('user_full_name', $query_run['full_name']);
						$this->session->set_userdata('user_email_id', $query_run['email_id']);
						$this->session->set_userdata('state_row_id', $query_run['state_row_id']);

						$insert_array = array('user_row_id'=>$query_run['id'], 'login_date_n_time'=>$date_n_time, 'logout_date_n_time'=>$date_n_timee, 'online_status'=>1, 'date_only'=>$date_only);

						$this->db->insert('tbl_users_active_reports',$insert_array);
						$insert_id = $this->db->insert_id();

						$this->db->limit(1);
				        $this->db->where('user_row_id',$query_run['id']);
				        $this->db->where('date_only',$date_only);
				        $query = $this->db->get('tbl_users_login_logs');
						if(!$query->num_rows()) 
						{			

							$login_logs = array('user_row_id'=>$query_run['id'], 'date_only'=>$date_only);
							$this->db->insert('tbl_users_login_logs',$login_logs);
						}
						$this->session->set_userdata('active_report_insert_id', $insert_id);
						$this->session->set_userdata('login_date_n_time', $date_n_time);

			                
						redirect('dashboard');
				}
				else
				{
					$this->session->set_flashdata('alert_msg','Sorry your account has been disabled, please contact to administrator.');
					redirect(base_url('login'));
				}
			}
		}
		$this->session->set_flashdata('alert_msg','Sorry, Invalid login credentials.');
		redirect(base_url('login'));
	}


	 public function user_login_into_account()
	 {
	        $login_id = $this->input->post('login_id');
	        $password = $this->input->post('password');
	        $date_n_time = date('Y-m-d H:i:s');


	        $user_ip_address = getenv('HTTP_CLIENT_IP')?:
	        getenv('HTTP_X_FORWARDED_FOR')?:
	        getenv('HTTP_X_FORWARDED')?:
	        getenv('HTTP_FORWARDED_FOR')?:
	        getenv('HTTP_FORWARDED')?:
	        getenv('REMOTE_ADDR');
	       
	        $this->db->where("(email_id = '$login_id' or user_name = '$login_id')");
	        $this->db->order_by('id', 'ASC');
	        $this->db->limit(1);
	        $query = $this->db->get('tbl_users');
	        if($query->num_rows())
	        {
	            $row = $query->row_array();
	   
	            if($password == $row['password'])
	            {
		                if($row['login_status'] == 1)
		                {	
	                	    $this->session->set_userdata('user_row_id', $row['id']);
	                		$this->session->set_userdata('user_full_name', $row['full_name']);
			                $this->session->set_userdata('user_email_id', $row['email_id']);
			                $this->session->set_userdata('user_mobile_number', $row['mobile_number']);
			                $this->session->set_userdata('user_unique_user_name', $row['user_name']);
			                $this->session->set_userdata('user_last_login_date_n_time', $row['login_date_n_time']);
			                $this->session->set_userdata('user_last_login_ip_address', $row['login_ip_address']);
			               

                            $this->db->where('id',$row['id']);
			                $this->db->set('login_date_n_time',$date_n_time);
			                $this->db->set('login_ip_address',$user_ip_address);
			                $this->db->update('tbl_users');
			                redirect(base_url().'dashboard');
		                }
		        $this->session->set_flashdata('alert_message','You dont have permission to login. please contact administator for more details');
		        redirect(current_url());
	            }
	            
	        }
	           
	            $this->session->set_flashdata('alert_message', 'Invalid login credentials');
	            redirect(current_url());
	        
	    }
}
?>