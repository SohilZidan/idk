<?php

/**
* 
*/
class Scholarship_model extends CI_Model
{
	public function get_scholarship_by_org($id)
	{
		$this->db->select('
			scholarship.id scholarship_id,
			scholarship.name scholarship_name,
			degree.id degree_id,
			degree.degree degree_name
			');
		$this->db->from("organization");


		$this->db->where(array('organization.id' => $id));
		$this->db->join('scholarship','organization.id = scholarship.organization_id');
		$this->db->join('scholarship_has_degree','scholarship_has_degree.scholarship_id=scholarship.id');
		$this->db->join('degree','degree.id = scholarship_has_degree.degree_id');

		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return 0;
		}
		return $query->result_array();
	}

	function getscholarshipByID($id,$user_id='users')
	{
		// get scholarship info
		$this->db->select("*");
		$this->db->from('scholarship');
		$this->db->where(array('id'=>$id));
		$this->db->limit(1);
		$S_query = $this->db->get();
		if ($S_query->num_rows() == 0) {
			return false;
		}
		$S_result = $S_query->row_array();

		// get publisher username
		if ($user_id=='users') {
			$this->db->select('id, username');
			$this->db->from($user_id);
			$this->db->where(array('id'=>$S_result['users_id']));
		}
		else
		{
			$this->db->select('id, name username');	
			$this->db->from($user_id);
			$this->db->where(array('id'=>$S_result['organization_id']));
		}
		$this->db->limit(1);
		$User_query = $this->db->get();
		$User_result = $User_query->row_array();

		// get country name
		$this->db->select('id, country');
		$this->db->from('country');
		$this->db->where(array('id'=>$S_result['country_id']));
		$this->db->limit(1);
		$Country_query = $this->db->get();//_where('country',);
		$Country_result = $Country_query->row_array();

		// get degrees id
		$this->db->select('degree_id');
		$this->db->from('scholarship_has_degree');
		$this->db->where(array('scholarship_id'=>$S_result['id']));
		$degree_query = $this->db->get();
		$degree_result = $degree_query->result_array();
		$degree_id =array();
		foreach ($degree_result as $row) {
			$degree_id[]=$row['degree_id'];
		}

		// go to degree table
		$this->db->select('*');
		$this->db->from('degree');
		$this->db->where_in('id',$degree_id);
		$degree_query = $this->db->get();
		$degree_result = $degree_query->result_array();
		
		//go to like table
		$this->db->where('scholarship_id',$id);
		$like_result = $this->db->count_all_results('Like');
		$S_result['likes'] = $like_result;

		// go to report table
		$this->db->where('scholarship_id',$id);
		$report_result = $this->db->count_all_results('report');
		$S_result['reports'] = $report_result;

		unset($S_result['users_id']);
		unset($S_result['country_id']);

		$result['scholarship'] = $S_result;
		$result['user'] = $User_result;	
		$result['country'] = $Country_result;
		$result['degrees']=$degree_result;
		//$result['loggingUser'] = $User_who_login;

		return $result;
	}

	public function interact_with($table,$scholarship_id,$user_id)
	{
		// if this user interact(save, like, report) with this scholarship
		$this->db->select("*");
		$this->db->from($table);
		$this->db->where(array('scholarship_id'=>$scholarship_id, 'users_id'=>$user_id));
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->num_rows();
	}

	function report_scholarship($id,$user_id)
	{

	}

	function _like($scholarship_id, $id)
	{
		$data = array(
			'users_id' => $id,
			'scholarship_id' => $scholarship_id);
			//'scholarship_users_id' => $scholarship_users_id);

		$this->db->where($data);
		$query = $this->db->get('like');
		$result = $query->row();

		//return $result;

		if(is_null($result))
		{
			$this->db->where($data);
			$query = $this->db->get('report');
			$result_report = $query->row();
			if (!is_null($result_report)) {
				return 2;
			}
			$this->db->insert('like', $data);
			return 1; // status is like
		}
		else
		{
			$this->db->where($data);
			$this->db->delete('like');
			return 0; // status is not like
		}

	}

	function like_count($scholarship_id, $id)
	{
		$result['like_status']  = $this->_like($scholarship_id, $id);
		//go to like table
		$this->db->where('scholarship_id',$scholarship_id);
		$result['like_count'] = $this->db->count_all_results('like');
		
		return $result;
	}

	function _report($scholarship_id, $id)
	{
		$data = array(
			'users_id' => $id,
			'scholarship_id' => $scholarship_id);
			//'scholarship_users_id' => $scholarship_users_id);

		$this->db->where($data);
		$query = $this->db->get('report');
		$result = $query->row();

		//return $result;

		if(is_null($result))
		{
			$this->db->where($data);
			$query = $this->db->get('like');
			$result_like = $query->row();
			if (!is_null($result_like)) {
				return 2; // status is failure to report because of previous like
			}
			//$data['type_id'] = 1;
			$this->db->insert('report', $data);
			return  1; // status is report
		}
		else
		{
			$this->db->where($data);
			$this->db->delete('report');
			return 0; // status is not report 
		}

	}

	function report_count($scholarship_id, $id)
	{
		$result['report_status']  = $this->_report($scholarship_id, $id);
		//go to like table
		$this->db->where('scholarship_id',$scholarship_id);
		$result['report_count'] = $this->db->count_all_results('report');
		
		return $result;
	}


	function _save($scholarship_id, $id)
	{
		$data = array(
			'users_id' => $id,
			'scholarship_id' => $scholarship_id);
//			'scholarship_users_id' => $scholarship_users_id);

		$this->db->where($data);
		$query = $this->db->get('savedscholarship');
		$result = $query->row();

		//return $result;

		if(is_null($result))
		{
			$this->db->insert('savedscholarship', $data);
			return  1; // status is report
		}
		else
		{
			$this->db->where($data);
			$this->db->delete('savedscholarship');
			return 0; // status is not report 
		}

	}

	function _get($table)
	{
		$query = $this->db->get($table);
		$result = $query->result();
		return $result;
	}
	
	function insert_scholarship($data)
	{
		//$this->db->query("ALTER TABLE scholarship AUTO_INCREMENT 1");
		$scholarship_table = $data;

		// to insert into scholarship_degree table		
		unset($scholarship_table['degree_id']);
		$this->db->insert('scholarship',$scholarship_table);

		// insert into scholarship degree table
		$scholarship_degree['scholarship_id'] = $this->db->insert_id();
		$scholarship_degree['degree_id'] = $data['degree_id'];
		//$scholarship_degree['scholarship_users_id'] = $data['users_id'];
		$this->db->insert('scholarship_has_degree',$scholarship_degree);

		// return scholarship_id
		return $scholarship_degree['scholarship_id'];
		//$this->db->get_where('scholarship',$scholarship_table);

	}

	public function get_all_scholarship()
	{
		$this->db->select('
			scholarship.id scholarship_id,
			scholarship.name scholarship_name,
			country.id country_id,
			country.country country_name,
			degree.id degree_id,
			degree.degree degree_name
			');
		$this->db->from('scholarship');
		$this->db->join(
			'scholarship_has_degree',
			'scholarship_has_degree.scholarship_id = scholarship.id'
			);
		$this->db->join('degree','scholarship_has_degree.degree_id = degree.id');
		$this->db->join('country','country.id = scholarship.country_id');
		$query = $this->db->get();

		if ($query->num_rows() == 0) {
			return 0;
		}
		else
		{
			return $query->result_array();
		}
	}

}