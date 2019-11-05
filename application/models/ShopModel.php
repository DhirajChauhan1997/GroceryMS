<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class ShopModel extends CI_Model
{

	function __construct()
	{
		// Set table name
		$this->table = 'gms_main_category';
	}

	function get_shoptypes()
	{
		$query = $this->db->get('gms_shop_type');
		return $query;
	}

	function get_states()
	{
		$query = $this->db->get('gms_state');
		return $query;
	}
	function get_city($stateid)
	{
		$query = $this->db->get_where('gms_city', array('state_id' => $stateid));
		return $query;
	}
}
