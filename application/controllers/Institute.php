<?php

/**
* 
*/
class Institute extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();


        $this->load->helper('url');

        $this->load->model('institute_model');
        
		$this->load->library('form_validation');

		$this->load->library('session');
	}

	public function show_all_institute()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$res = $this->institute_model->get_all_institute();

		if (!isset($res)) {
			redirect(site_site());
		}
		
		$tmp = array();
		foreach ($res as $key ) {
			$tmpkey = $key;
			unset($tmpkey['institute_id']);
			$tmp[$key['institute_id']][] = $tmpkey;
		}

		$output = array();
		foreach ($tmp as $institute_id => $details ) {
			//$tmpdetails = $details;
			//unset($tmpdetails['institute_name']);
			$output[] = array(
				'institute_id' => $institute_id,
				'institute_name' => $details['0']['institute_name'],
				'details' => $details
				);
		}


		//var_dump($output);
		$data['institutes'] = $output;
		$this->load->view('InstitutesPages',$data);
	}

	public function show_institute($institute_id)
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$res = $this->institute_model->get_institute($institute_id);
		$res2 = $this->institute_model->get_course_by_inst($institute_id) ;
		if ($res == 0) {
			echo "is not exist";
		}
		else
		{

			$tmp = array();
			foreach ($res as $key ) {
				$tmpkey = $key;
				unset($tmpkey['institute_id']);
				$tmp[$key['institute_id']][] = $tmpkey;
			}

			$output = array();
			foreach ($tmp as $institute_id => $details ) {
				//$tmpdetails = $details;
				//unset($tmpdetails['institute_name']);
				$output = array(
					'institute_id' => $institute_id,
					'institute_name' => $details['0']['institute_name'],
					'institute_description' => $details['0']['institute_description'],
					'details' => $details
					);
			}

			
			$data['institute'] = $output;
			if (isset($res2['0'])) {
				$data['course'] = $res2['0'];
			}
			//var_dump($data['course']);
			$this->load->view('institute',$data);
		}
		
	}
}

?>