<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admi32n_ma4nager_con45trol_panel/UsersM');
		if(!$this->session->userdata('admin_manage_row_id') || !$this->session->userdata('admin_manage_full_name')  || !$this->session->userdata('admin_manage_login_id')) 
		{
			redirect(base_url('admi32n_ma4nager_con45trol_panel/login'));
		}

	}

	public function index()
	{
		$data[] = '';
		$data['get_users_list'] = $this->UsersM->get_users_list();

		if(isset($_POST['enable_user_account'])) 
	 	{
	 		$this->form_validation->set_rules('request_row_id', 'request_row_id', 'trim|required');
		    if($this->form_validation->run())
		    {
		        $run = $this->UsersM->enable_user_account();
		    }
	 	}

	 	if(isset($_POST['disable_user_account'])) 
	 	{
	 		$this->form_validation->set_rules('request_row_id', 'request_row_id', 'trim|required');
		    if($this->form_validation->run())
		    {
		        $run = $this->UsersM->disable_user_account();
		    }
	 	}



		


		$this->load->view('admi32n_ma4nager_con45trol_panel/users', $data);
	}


	public function user_details() 
	{
		if(isset($_POST['request_row_id']))
		{
			$view =  $this->UsersM->user_individual_details($_POST['request_row_id']); 
		?>


		<table class="table table-bordered">
			<tr>
				<td>User Name</td>
				<td><?php echo $view['full_name'];?></td>
				<td>Mobile Number</td>
				<td><?php echo $view['mobile_number'];?></td>
			</tr>
			<tr>
				<td>Email ID</td>
				<td><?php echo $view['email_id'];?></td>
				<td>Registered On</td>
				<td><?php echo date('d, M Y h:i a',strtotime($view['date_n_time']));?></td>
			</tr>



			<tr>
				<td>City</td>
				<td><?php echo $view['city_name'];?></td>
				<td>District</td>
				<td><?php echo $view['district_name'];?></td>
			</tr>
			<tr>
				<td>Pincode</td>
				<td><?php echo $view['pincode'];?></td>
				<td>State</td>
				<td><?php echo $view['state_name'];?></td>
			</tr>
			<tr>
				<td>job name</td>
				<td><?php echo $view['job_name'];?></td>
				<td>experience name</td>
				<td><?php echo $view['experience_name'];?></td>
			</tr>
		</table>
		<?php	
		}
	}
}
?>