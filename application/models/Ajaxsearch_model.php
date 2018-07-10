<?php

/**
* 
*/
class Ajaxsearch_model extends CI_model
{
	
	function fetch_data($query)
	{
		
		$this->db->select("*");
		$this->db->from("customer");
		if ($query != '') 
		{
			# code...
			$this->db->like('CustomerName',$query);
			$this->db->or_like('Address',$query);
			$this->db->or_like('City',$query);
			$this->db->or_like('PostalCode',$query);
			$this->db->or_like('Country',$query);
		}
		$this->db->order_by('ID','DESC');
		return $this->db->get();
	}
}
?>