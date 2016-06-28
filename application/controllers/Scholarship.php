<?php
/**
* 
*/
class Scholarship extends CI_Controller
{
	
	public function __construct()
    {
        parent::__construct();
        
        $this->load->helper('url');

        $this->load->model('scholarship_model');
        
		$this->load->library('form_validation');
		$this->load->library('session');
		
    }

    public function show_show()
    {
    	$this->load->view('tesr54545t.php');
    }
	

	function show_scholarship($id,$user_id='users')
	{
		$details=array();
		if (isset($this->session->userdata['loggedin'])) {
			$details['loggedin'] = 1;
		}
		// to use in view pages
		$type = 'users';
		if (isset($this->session->userdata['loggedin']) && $this->session->userdata['loggedin']['type']==2 ) {
			$type = 'organization';
		}

		$details['res'] = $this->scholarship_model->getscholarshipByID($id,$type);
		
		if ($details['res'] == false) {
			redirect(site_url());
		}
		else
		{
			if (isset($this->session->userdata['loggedin'])) {
			$details['loggedin'] = true;
			$details['type'] = $this->session->userdata['loggedin']['type'];
			$user_id = $this->session->userdata['loggedin']['id'];
			$user_login['id']=$user_id;
			$user_login['like']=$this->scholarship_model->interact_with('Like',$id,$user_id);
			$user_login['report']=$this->scholarship_model->interact_with('report',$id,$user_id);
			$user_login['saved']=$this->scholarship_model->interact_with('savedscholarship',$id,$user_id);
			$details['res']['loggingUser']=$user_login;
			}
			
			if(!isset($details))
			{
				redirect(site_url());
			}
			//var_dump($details);
			$this->load->view('Scholarship',$details);
			//echo json_encode($details);
		}
		

	}

	public function show_all_scholarship()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$res = $this->scholarship_model->get_all_scholarship();
		if (!isset($res)) {
			redirect(site_site());
		}


		$tmp = array();
		foreach ($res as $key ) {
			$tmpkey = $key;
			unset($tmpkey['scholarship_id']);
			$tmp[$key['scholarship_id']][] = $tmpkey;
		}

		$output = array();
		foreach ($tmp as $institute_id => $details ) {
			//$tmpdetails = $details;
			//unset($tmpdetails['institute_name']);
			$output[] = array(
				'scholarship_id' => $institute_id,
				'scholarship_name' => $details['0']['scholarship_name'],
				'country_id' => $details['0']['country_id'],
				'country_name' => $details['0']['country_name'],
				'details' => $details
				);
		}
		$data['scholarships'] = $output;
		//var_dump($output['0']);
		$this->load->view('scholarshipPages',$data);
	}

	function insert_scholarship()
	{
		if (!isset($this->session->userdata['loggedin'])) {
			redirect(site_url());
			//echo $this->session->userdata['loggedin']['id'];
		}
		if (isset($_POST['name'])) {
			$data['name']=$this->input->post('name');
			
			if ($this->session->userdata['loggedin']['type'] == 0) {
				$data['users_id']=$this->session->userdata['loggedin']['id'];
				//$data['organization_id']=0;
			}
			elseif ($this->session->userdata['loggedin']['type'] == 2) {
				//$data['users_id']=0;
				$data['organization_id']=$this->session->userdata['loggedin']['id'];	
			}
			else{
				redirect(site_url());
			}
			var_dump($data);

			$data['country_id']=$this->input->post('country');
			$data['deadline']=date('Y-m-d',strtotime($this->input->post('deadline')));
			$data['description']=$this->input->post('description');
			$data['url']=$this->input->post('url');
			$data['degree_id']=$this->input->post('degree');
		}
		//var_dump($data);
		else
		{
			redirect(site_url('Scholarship/create_scholarship'));
		}
		var_dump($data);
		// insert scholarship and get its id
		$scholarship_id = $this->scholarship_model->insert_scholarship($data);
		$type='users';
		if ($this->session->userdata['loggedin']['type'] == 2) {
			//redirect(site_url("scholarship/show_scholarship/$scholarship_id/organization"));
			$type = 'organization';
		}
		redirect(site_url("scholarship/show_scholarship/$scholarship_id/$type"));
		
	}

	function create_scholarship()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		if (!isset($this->session->userdata['loggedin'])) {
			redirect(site_url());
		}
		$data['degree'] = $this->scholarship_model->_get('degree');
		$data['country'] = $this->scholarship_model->_get('country');
		//var_dump($data);
		$this->load->view('create_scholarship',$data);
	}

	
	function likes()
	{

		if (!isset($this->session->userdata['loggedin'])) {
			$result['like_status'] = 2;
			$result['like_count'] = 0;
			echo json_encode($result);
		}
		else
		{
			$scholarship_id = $this->input->post('scholarship_id');
			$id = $this->session->userdata['loggedin']['id'];

			if (!isset($scholarship_id) || !isset($id)) {
				redirect(site_url());
			}

			$this->load->model('scholarship_model');
			$result = $this->scholarship_model->like_count($scholarship_id, $id);
			//var_dump($result);
			//echo is_null($result);
			//echo isset($result);

			echo json_encode($result);
			//var_dump($result);	
		}
		
	}

	function reports()
	{
		if (!isset($this->session->userdata['loggedin'])) {
			$result['report_status'] = 2;
			$result['report_count'] = 0;
			echo json_encode($result);
		}

		else
		{
			$scholarship_id = $this->input->post('scholarship_id');
			$id = $this->session->userdata['loggedin']['id'];

			if (!isset($scholarship_id) || ! isset($id)) {
				redirect(site_url());
			}

			$this->load->model('scholarship_model');
			$result = $this->scholarship_model->report_count($scholarship_id, $id);
			//var_dump($result);
			//echo is_null($result);
			//echo isset($result);
			echo json_encode($result);
			//var_dump($result);
		}
		
	}

	function saves()
	{
		if (!isset($this->session->userdata['loggedin'])) {
			echo json_encode(2);
		}

		$scholarship_id = $this->input->post('scholarship_id');
		$id = $this->input->post('users_id');

		if (!isset($scholarship_id) || ! isset($id)) {
			redirect(site_url());
		}

		$this->load->model('scholarship_model');
		$result = $this->scholarship_model->_save($scholarship_id, $id);
		//var_dump($result);
		//echo is_null($result);
		//echo isset($result);
		echo json_encode($result);
		//var_dump($result);
	}

}