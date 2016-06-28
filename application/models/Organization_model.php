<?php

/**
* 
*/
class Organization_model extends CI_Model
{
	public function get_all_organization()
	{
		$this->db->select('
			organization.id organization_id,
			organization.name organization_name,
			organization.description organization_description,
			organization.country_id organization_country_id,
			country.country organization_country_name,
			COUNT(scholarship.organization_id) scholarship_count
			');
		$this->db->from('organization');
		$this->db->join('country','organization.country_id = country.id');
		$this->db->join('scholarship','organization.id = scholarship.organization_id','left');
		$this->db->group_by('organization.id');

		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			return $query->result_array();
		}
		return 0;
	}

	public function get_organization_by_id($organization_id)
	{
		$this->db->select('
			organization.id organization_id,
			organization.name organization_name,
			organization.description organization_description,
			organization.country_id organization_country_id,
			country.country organization_country_name,
			COUNT(scholarship.organization_id) scholarship_count
			');
		$this->db->from('organization');
		$this->db->where(array('organization.id =' => $organization_id));
		$this->db->join('country','organization.country_id = country.id');
		$this->db->join('scholarship','organization.id = scholarship.organization_id','left');
		$this->db->group_by('organization.id');

		$query = $this->db->get();
		if ($query->num_rows() != 0) {
			return $query->result_array();
		}
		return 0;
	}
}

?>