<?php 
class DashboardM extends CI_Model {
	

	public function overview() 
	{	
		$result[] = array();

		$result['total_users']  = $this->db->count_all_results('tbl_users');
		return $result;


		

	}
}
?>