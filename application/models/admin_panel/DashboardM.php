<?php 
class DashboardM extends CI_Model {
	

	public function overview() 
	{	
		$result[] = array();

		$result['total_users']  = $this->db->count_all_results('tbl_users');

		$today_date = date('Y-m-d');

		$this->db->where('date_only',$today_date);
		$result['today_users']  = $this->db->count_all_results('tbl_users');

		
		return $result;
	}
}
?>