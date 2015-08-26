<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Context_model extends CI_Model {
	function __construct(){
		// Call the Model constructor
		parent::__construct();
    }

    function get_list($type){
    	$this->db->select('*');
    	$this->db->from('itsa_exam');
    	switch($type){
    		case "all":
    		break;
    		case "itsa":
    			$this->db->where('itsa_type', 1);
    		break;
    		case "ptc":
    			$this->db->where('itsa_type', 2);
    		break;
    		case "cpe":
    			$this->db->where('itsa_type', 3);
    		break;
    	}
    	$this->db->order_by('itsa_id', 'desc');
		$query = $this->db->get();

		return $query->result_array();
    }
}