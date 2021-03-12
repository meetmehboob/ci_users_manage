<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class R extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('RegisterM');
	}

	public function index()
	{
		$data[] = '';
		$data['get_users_experience_types'] = $this->RegisterM->get_users_experience_types();
		$data['get_states'] = $this->RegisterM->get_states();
		

	 	if(isset($_POST['save_n_register'])) 
	 	{
	 		$this->form_validation->set_rules('gender_type', 'gender type', 'trim|required');
		    $this->form_validation->set_rules('full_name', 'full name', 'trim|required');
		    $this->form_validation->set_rules('mobile_number', 'mobile number', 'trim|required|min_length[5]|max_length[20]|is_natural');
		    $this->form_validation->set_rules('email_id', 'email id', 'trim|valid_email');
		    $this->form_validation->set_rules('state_row_id', 'state', 'trim|required');
		    $this->form_validation->set_rules('city_row_id', 'city', 'trim|required');
		    $this->form_validation->set_rules('pincode', 'pincode', 'trim|required');
		    $this->form_validation->set_rules('area_name', 'area name', 'trim|required');
		    $this->form_validation->set_rules('password', 'password', 'trim|required');
		    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
		    if($this->form_validation->run())
		    {
		           $run = $this->RegisterM->save_n_register_user();
		    }
	 	}

		$this->load->view('register', $data);
	}


	public function get_city_list()
	{
		if(isset($_POST['state_row_id']))
		{
			$set_value = $_POST['set_value'];

			$get_city_list = $this->RegisterM->get_city_list($_POST['state_row_id']); 
			if(!empty($get_city_list)) {
			foreach($get_city_list as $list)
			{
			?>
			 <option value="<?php echo $list['id']?>" <?php if($set_value == $list['id']) { echo "selected";}?>><?php echo $list['city_name']?>, <?php echo $list['district_name']?></option>
		<?php 
			}
			}
			else
			{ ?>
				 <option value="">Select City</option>
			<?php }
		}
	}


}
?>