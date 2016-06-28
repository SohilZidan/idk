<?php
/**
* 
*/
class Auth extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		// Load form helper library
		$this->load->helper('form');

		// load url helper
		$this->load->helper('url');

		// Load form validation library
		$this->load->library('form_validation');

		// Load session library
		$this->load->library('session');

		// Load database
		$this->load->model('User_model');
		$this->load->model('scholarship_model');
	}

	function _test()
	{
		$this->load->model('scholarship_model');
		$data['degree'] = $this->scholarship_model->_get('degree');
		$data['country'] = $this->scholarship_model->_get('country');
		$this->load->view('nonuser_signup.php',$data);	
	}
	
	function check_username()
	{
		$this->form_validation->set_rules('username','Username','trim|required');
		$data = array();
		if ($this->form_validation->run() == true) {
			$username = $this->input->post('username');
			$result = $this->User_model->check_username($username);
			if ($result == false) {
				$data['available']=true;
			}
			else{
				$data['available']=false;
			}
		}
		//var_dump(json_encode($data));
		echo json_encode($data);
	}

	function login()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$this->load->view('login.php',$data);	
	}
    
   
	function signup()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$this->load->model('scholarship_model');
		$data['degree'] = $this->scholarship_model->_get('degree');
		$data['country'] = $this->scholarship_model->_get('country');
		$this->load->view('signup',$data);	
	}

	function nonuser_signup()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$this->load->model('scholarship_model');
		$data['degree'] = $this->scholarship_model->_get('degree');
		$data['country'] = $this->scholarship_model->_get('country');
		//$this->load->view('signup',$data);
		$this->load->view('nonuser_signup.php',$data);	
	}

	function user_login()
	{
		$this->form_validation->set_rules('email',"Email",'trim|required');
		$this->form_validation->set_rules('password',"Password",'trim|required');
		//$this->form_validation->set_message('xss_clean', 'Error Message');

		if ($this->form_validation->run() == false) {
			if (isset($this->session->userdata['loggedin'])) {
				//$this->load->view('');
				echo "LOGGEDIN BEFORE";
			}
			else{
				echo "else1";
				$this->load->view('login');
			}
		}
		else{
			$data = array(
				'email'=>$this->input->post('email'),
				'password'=>$this->input->post('password')
				);

			// CHECK NORMAL USER
			$result = $this->User_model->login($data,'users');
			if ($result == true) {
				$email = $this->input->post('email');
				$result = $this->User_model->get_user_information($email,"users");
				if ($result != false) {
					$session_data = array(
						'username'=>$result->username,
						'email'=>$result->email,
						'id' => $result->id,
						'type' => 0
						);
					$this->session->set_userdata('loggedin',$session_data);
					//$this->load->view('');
					echo "SUCCEED";
					redirect('scholarship/show_all_scholarship');
				}
			}
			else{
				// INSTITUTE USER
				$result = $this->User_model->login($data,'institute');
				if ($result == true) {
					$email = $this->input->post('email');
					$result = $this->User_model->get_user_information($email,"institute");
					
					if ($result != false) {
						$session_data = array(
							'name'=>$result->institute,
							'email'=>$result->email,
							'id' => $result->id,
							'type' => 1
							);
						$this->session->set_userdata('loggedin',$session_data);
						
						echo "SUCCEED INSTITUTE USER";
						redirect('institute/show_all_institute');
					}
				}
				else
				{
					// ORGANIZATION USER
					$result = $this->User_model->login($data,'organization');
					if ($result == true) {
						$email = $this->input->post('email');
						$result = $this->User_model->get_user_information($email,"organization");
						
						if ($result != false) {
							$session_data = array(
								'name'=>$result->name,
								'email'=>$result->email,
								'id' => $result->id,
								'type' => 2
								);
							$this->session->set_userdata('loggedin',$session_data);
							//$this->load->view('');
							echo "SUCCEED ORGANIZATION USER";
							redirect('organization/show_all_organization');
						}
					}
					else
					{
						var_dump($data);
						// IF NOT EXIST
						$data = array(
							'error_message' => 'Invalid Email or Password'
							);
						$this->load->view('login', $data);	
					}
				
			}
			
		}
	}
	}

	function user_signup()
	{
		// Check validation for user input in SignUp form
		$this->form_validation->set_rules('firstname', 'FirstName', 'trim|required');
		$this->form_validation->set_rules('lastname', 'LastName', 'trim|required');
		$this->form_validation->set_rules('username', 'Username', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		$this->form_validation->set_rules('country', 'Country', 'trim|required');
		$this->form_validation->set_rules('degree', 'Degree', 'trim|required');
		if ($this->form_validation->run() == false) {
			{
				if (isset($this->session->userdata['loggedin'])) {
					//$this->load->view('');
					echo "LOGGEDIN BEFORE";
				}
				else{
					$data['degree'] = $this->scholarship_model->_get('degree');
					$data['country'] = $this->scholarship_model->_get('country');
					$this->load->view('signup',$data);
				}
			}
		} else {
			$data = array(
				'first_name' => $this->input->post('firstname'),
				'last_name' => $this->input->post('lastname'),
				'username' => $this->input->post('username'),
				'email' => $this->input->post('email'),
				'password' => $this->input->post('password'),
				'country_id' => $this->input->post('country'),
				'degree_id' => $this->input->post('degree')
				);
			//var_dump($data);  var dump
			$result = $this->User_model->registration($data);
			if ($result == true) {
				$data['message_display'] = 'تم التسجيل بنجاح';
				$this->load->view('login', $data);
			} else {
				$data['message_display'] = 'هذا البريد الالكتروني مستخدم !';
				$data['degree'] = $this->scholarship_model->_get('degree');
				$data['country'] = $this->scholarship_model->_get('country');
				$this->load->view('signup',$data);
			}
		}		
	}
	// so test git vim
	function logout()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$this->session->unset_userdata('loggedin');
		$data['message_display'] = 'Successfully Logout';
		$this->load->view('login', $data);
	}

}
