<?php

/**
* 
*/
class Institute_model extends CI_Model
{
	
	public function get_all_institute()
	{
		$this->db->select('institute.id institute_id, institute.institute institute_name, address.id address_id, address.address address_name, city.id city_id, city.city city_name, country.id country_id, country.country country_name');
		$this->db->from('institute');
		//$this->db->limit(1);
		$this->db->join('institute_has_address','institute.id = institute_has_address.institute_id');
		$this->db->join('address','address.id = institute_has_address.address_id');
		$this->db->join('city','city.id = address.city_id');
		$this->db->join('country','country.id = city.country_id');
		//$this->db->group_by('institute.id');
		$res = $this->db->get();
		return $res->result_array();
	}

	public function get_institute($institute_id)
	{
		$this->db->select('
			institute.id institute_id,
			institute.institute institute_name,
			institute.description institute_description, 
			address.id address_id, address.address address_name,
			city.id city_id, city.city city_name,
			country.id country_id, country.country country_name,
			institute_has_address.description address_description,
			address.phone address_phone1,
			address.phone1 address_phone2
			');
		$this->db->from('institute');
		$this->db->where(array('institute.id' => $institute_id));
		//$this->db->limit(1);
		$this->db->join('institute_has_address','institute.id = institute_has_address.institute_id');
		$this->db->join('address','address.id = institute_has_address.address_id');
		$this->db->join('city','city.id = address.city_id');
		$this->db->join('country','country.id = city.country_id');

		$res = $this->db->get();
		if ($res->num_rows() != 0) {
			return $res->result_array();
		}
		return 0;
	}


	public function get_course_by_inst($id)
	{
		$this->db->select('
			course.id course_id,
			course.name course_name,
			language.id language_id,
			language.name language_name
			');
		$this->db->from("course");
		$this->db->where(array('course.institute_id' => $id));
		$this->db->limit(1);
		$this->db->join('language','language.id=course.language_id');

		$query = $this->db->get();
		if ($query->num_rows() == 0) {
			return 0;
		}
		return $query->result_array();
	}



}

?>