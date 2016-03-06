<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	function login($user_login, $user_pwd){
		$this->db->from('itsa_admin');
		$this->db->where('user_login', $user_login);
		$this->db->where('user_pass', MD5($user_pwd));
		$user=$this->db->get()->row();

		if( count($user) == 1 ){
			$this->session->set_userdata('user_login', $user->user_login );
			$this->session->set_userdata('user_level', $user->user_level );
			return true;
		}else{
			return false;
		}
	}

	function is_login(){
		return $this->session->has_userdata('user_login');
	}
	
	function get_students(){
		$this->db->from('itsa_user');
		return $this->db->get()->result();
	}

	function get_like_students($str){
		$this->db->from('itsa_user');
		$this->db->like('user_name', $str);
		$this->db->or_like('user_id', $str);
		return $this->db->get()->result();
	}
	function get_student($user_id){
		$this->db->from('itsa_user');
		$this->db->where('user_id', $user_id);
		return $this->db->get()->row();
	}

	function update_student($user_id,$user_name){
		$user = array(
			"user_name" => $user_name
		);
		$this->db->where("user_id", $user_id);
		return $this->db->update('itsa_user', $user);
	}

	function add_student($user_id,$user_name){
		$user = array(
			"user_id"   => $user_id,
			"user_name" => $user_name
		);
		return $this->db->insert('itsa_user', $user);
	}

	function update_context($itsa_id,$itsa_th,$itsa_type,$itsa_date,$itsa_place,$itsa_semeter,$exam_num,$team_num){
		$exam = array(
			"itsa_th"      => $itsa_th,
			"itsa_type"    => $itsa_type,
			"itsa_date"    => $itsa_date,
			"itsa_place"   => $itsa_place,
			"itsa_semeter" => $itsa_semeter,
			"exam_num"     => $exam_num,
			"team_num"     => $team_num
		);
		$this->db->where("itsa_id", $itsa_id);
		return $this->db->update('itsa_exam', $exam);
	}

	function add_context($itsa_th,$itsa_type,$itsa_date,$itsa_place,$itsa_semeter,$exam_num,$team_num){
		$exam = array(
			"itsa_th"      => $itsa_th,
			"itsa_type"    => $itsa_type,
			"itsa_date"    => $itsa_date,
			"itsa_place"   => $itsa_place,
			"itsa_semeter" => $itsa_semeter,
			"exam_num"     => $exam_num,
			"team_num"     => $team_num
		);
		return $this->db->insert('itsa_exam', $exam);
	}

	function get_context_team($itsa_id){
		$this->db->from('itsa_team');
    	$this->db->where('team_examid', $itsa_id);
		return $this->db->get()->result();
	}

	
}