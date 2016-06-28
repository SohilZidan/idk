<?php

/**
* 
*/
class Organization extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->helper('url');

        $this->load->model('organization_model');

        $this->load->model('scholarship_model');
        
		$this->load->library('form_validation');

		$this->load->library('session');
	}

	public function show_all_organization()
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		$res = $this->organization_model->get_all_organization();
		//var_dump($res);
		$data['organizations'] = $res;
		if ($res = 0) {
			//redirect()
			echo "There are no organizations yet";
		}
		else
		{
			$this->load->view('organizationPages',$data);	
		}
		
	}

	public function show_organization($id)
	{
		$data=array();
		if (isset($this->session->userdata['loggedin'])) {
			$data['loggedin'] = 1;
		}
		
		$res = $this->organization_model->get_organization_by_id($id);
		$res2 = $this->scholarship_model->get_scholarship_by_org($id);
		
		$data=array();

		if ($res == 0) {
			echo "this org is not exist";
		}
		else
		{
			$data['organization'] = $res['0'];
			if ($res2 != 0) {
				$tmp = array();
				foreach ($res2 as $key ) {
					$tmpkey = $key;
					unset($tmpkey['scholarship_id']);

					$tmp[$key['scholarship_id']][] = $tmpkey;
				}

				$output = array();
				foreach ($tmp as $scholarship_id => $details ) {
					$output[] = array(
						'scholarship_id' => $scholarship_id,
						'scholarship_name' => $details['0']['scholarship_name'],
						'degree' => $details
						);
				}
				$data['scholarship'] = $output['0'];
				//var_dump($data);
				$this->load->view('organization',$data);
			}
				
			
		}

		
	}
}

?>