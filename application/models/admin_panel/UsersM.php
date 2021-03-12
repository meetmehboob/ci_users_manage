<?php 
class UsersM extends CI_Model {


	public function get_users_list()
	{	
		if(isset($_GET['search']) && !empty($_GET['search'])) {
            $search = trim($_GET['search']); 
          $this->db->where("(email_id LIKE '%".$search."%' OR date_only LIKE '%".$search."%'  OR username LIKE '%".$search."%' OR full_name LIKE '%".$search."%' OR mobile_number LIKE '%".$search."%')", NULL, FALSE);
        } elseif(isset($_GET['active_status']) && !empty($_GET['active_status'])) {
            $active_status = trim($_GET['active_status']); 
            $active_status_array = array('enabled', 'disabled');
            
            if(in_array($active_status, $active_status_array)) {
                if($active_status == 'enabled') {
                    $this->db->where('login_status', 1);
                } else {
                   $this->db->where('login_status', 0); 
                }
            }
        }
		$this->db->order_by('user.id', 'DESC');
		$this->db->select('user.id, user.login_status, user.date_n_time, user.full_name, user.mobile_number, user.state_row_id, user.city_row_id, user.pincode, city.city_name, city.district_name, city.state_name');
		$this->db->join('tbl_cities as city', 'user.city_row_id=city.id');
		$query = $this->db->get('tbl_users as user')->result_array();
		return $query;
	}

	public function user_individual_details($request_row_id) 
	{
		$this->db->order_by('id', 'ASC');
		$this->db->limit(1);
		$this->db->where('id',$request_row_id);
		$query = $this->db->get('tbl_users')->row_array();
		$city_row_id = $query['city_row_id'];
		$job_row_id = $query['job_row_id'];
		$experience_row_id = $query['experience_row_id'];

		$this->db->limit(1);
		$this->db->where('id',$city_row_id);
		$query2 = $this->db->get('tbl_cities')->row_array();
		$query['city_name'] = $query2['city_name'];
		$query['district_name'] = $query2['district_name'];
		$query['state_name'] = $query2['state_name'];


		$this->db->limit(1);
		$this->db->where('id',$job_row_id);
		$query3 = $this->db->get('tbl_users_job_types')->row_array();
		$query['job_name'] = $query3['job_name'];

		$this->db->limit(1);
		$this->db->where('id',$experience_row_id);
		$query4 = $this->db->get('tbl_users_experience_types')->row_array();
		$query['experience_name'] = $query4['experience_name'];


		return $query;
	}

	public function enable_user_account() 
	{
		$request_row_id = $this->input->post('request_row_id');

		$this->db->order_by('id', 'ASC');
		$this->db->limit(1);
		$this->db->where('id',$request_row_id);
		$this->db->where('login_status',0);
		$query = $this->db->get('tbl_users');
		if($query->num_rows()) 
		{
			$this->db->where('id',$request_row_id);
			$this->db->set('login_status',1);
			$query = $this->db->update('tbl_users');
			$this->session->set_flashdata('alert_msg','This user has been enabled successfully, Thank you!');
			redirect(current_url());
		}
		return false;

	}

	public function disable_user_account() 
	{	
		$request_row_id = $this->input->post('request_row_id');
		
		$this->db->order_by('id', 'ASC');
		$this->db->limit(1);
		$this->db->where('id',$request_row_id);
		$this->db->where('login_status',1);
		$query = $this->db->get('tbl_users');
		if($query->num_rows()) 
		{
			$this->db->where('id',$request_row_id);
			$this->db->set('login_status',0);
			$query = $this->db->update('tbl_users');
			$this->session->set_flashdata('alert_msg','This user has been disabled successfully, Thank you!');
			redirect(current_url());
		}
		return false;
	}
	

}
?>