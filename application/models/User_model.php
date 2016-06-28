<?php
/**
* 
*/
class User_model extends CI_Model
{
	
	public function getuserbyID($id)
	{
		$query = $this->db->get_where($id);
		$result = $query->row_array();

		return $result;
	}
	public function login($data,$table)
	{
		$condition = "email ="."'".$data['email']."' AND ". "password ="."'".$data['password']."'";
		$this->db->select('*');
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->limit(1);
		
		/*$select = "SELECT * 
				   FROM users
				   WHERE email="."'".$data["email"]."' AND password='".$data["password"]."' LIMIT 1";
		$query = $this->db->query($select);
		//return $result->num_rows();
		*/
		$query = $this->db->get();
		//return $query;
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
		
	}

	public function registration($data)
	{
		$condition = array(
			'email' => $data['email']
			);
		$this->db->select("*");
		$this->db->from('users');
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			$this->db->insert('users',$data);
			// if inserted successfully
			if ($this->db->affected_rows() > 0) return true;
		}
		else return false;
	}

	public function get_user_information($email,$table)
	{
		$condition = array(
			'email' => $email
			);

		$this->db->select("*");
		$this->db->from($table);
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return $query->row();
		} else {
			return false;
		}
		
	}

	public function check_username($username)
	{
		$condition = array(
			'username' => $username
			);

		$this->db->select("*");
		$this->db->from("users");
		$this->db->where($condition);
		$this->db->limit(1);

		$query = $this->db->get();

		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
}