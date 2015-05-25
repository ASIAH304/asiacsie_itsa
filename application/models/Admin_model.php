<?php
class Admin_model extends CI_Model {
	function __construct(){
		// Call the Model constructor
		parent::__construct();
    }
    //get the username & password from tbl_usrs
	function login($username, $password){
		$this->db->select('user_login, user_pass, user_level');
		$this->db->from('itsa_admin');
		$this->db->where('user_login', $username);
		$this->db->where('user_pass', MD5($password));
		$this->db->limit(1);

		$query=$this->db->get();
		
		if($query->num_rows() == 1){
			return $this->login_session($query->result());
		}else{
			return false;
		}
	}
	function login_session($result){
		$sess_array = array();
		if($result){
			$sess_array = array();
			foreach($result as $row){
				$sess_array = array(
					'user_login' => $row->user_login,
					'user_level' => $row->user_level
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			return true;
		}else{
			$this->form_validation->set_message('check_database', 'Invalid username or password');
			return false;
		}
	}
	function is_login(){
		if($this->session->has_userdata('logged_in')){
			return true;
		}else{
			return false;
		}
	}
	function is_admin(){
		if($this->session->has_userdata('logged_in')){
			return ($this->session->logged_in['user_level'] >=4);
			/*if($this->session->logged_in['user_level'] >=4){
				return true;
			}else{
				return false;
			}*/
		}else{
			return false;
		}
	}
}