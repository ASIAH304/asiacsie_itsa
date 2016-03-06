<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Context_model extends CI_Model {
	function __construct(){
		parent::__construct();
    }

    function get_contexts($type="all"){
    	$this->db->from('itsa_exam');
    	switch($type){
    		default:
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
		return $this->db->get()->result();
    }

    function contexts_count(){
    	$this->db->select('team_examid, count(team_id) as count');
    	$this->db->from('itsa_team');
    	$this->db->group_by("team_examid");
    	$contexts_count = $this->db->get()->result();
    	$return=array();
		foreach($contexts_count as $key => $v){
			$return[$v->team_examid]=$v->count;
		}
		return $return;
    }

    function get_context($itsa_id){
    	$this->db->from('itsa_exam');
    	$this->db->join('exam_type','itsa_exam.itsa_type = exam_type.exam_id');
    	$this->db->where('itsa_id', $itsa_id);
		return $this->db->get()->row();
    }

    function get_teams($team_examid){
    	$this->db->from('itsa_team');
    	$this->db->where('team_examid', $team_examid);
    	$this->db->order_by('team_solved', 'desc');
    	$this->db->order_by('team_rank', 'asc');
		return $this->db->get()->result();
    }

    function get_users(){
    	$this->db->from('itsa_user');
    	$users = $this->db->get()->result();
    	return $users;
    }

    function get_user($user_id){
    	$this->db->from('itsa_user');
    	$this->db->where('user_id', $user_id);
    	$user = $this->db->get()->row();
    	return $user;
    }

    function get_user_name(){
    	$users = $this->get_users();
    	$return = array();
    	foreach ($users as $key => $user) {
    		$return[$user->user_id] = $user->user_id." ".$user->user_name;
    	}
    	return $return;
    }

    function get_teachers(){
    	$this->db->from('team_teacher');
    	$teachers = $this->db->get()->result();
    	return $teachers;
    }

    function get_teacher_name(){
    	$teachers = $this->get_teachers();
    	$return = array();
    	foreach ($teachers as $key => $user) {
    		$return[$user->user_login] = $user->user_name;
    	}
    	return $return;
    }

    function get_user_context($type,$user_id){
    	$itsa_type = 0;
    	switch($type){
    		case "itsa":
    			$itsa_type = 1;
    		break;
    		case "ptc":
    			$itsa_type = 2;
    		break;
    		case "cpe":
    			$itsa_type = 3;
    		break;
    	}
  //   	$this->db->from('itsa_team');
  //   	$this->db->join('itsa_exam','itsa_team.team_examid=itsa_exam.itsa_id');
  //   	$this->db->where('itsa_exam.itsa_type', $itsa_type);
  //   	$this->db->where('itsa_team.team_user1', $user_id);
		// $this->db->or_where('itsa_team.team_user2', $user_id);
		// $this->db->or_where('itsa_team.team_user3', $user_id);
		// $this->db->order_by('itsa_exam.itsa_id', 'asc');
  //   	return $this->db->get()->result();
  		return $this->db->query("select * from itsa_team as team join itsa_exam as exam on team.team_examid=exam.itsa_id where exam.itsa_type=".$itsa_type." and (team.team_user1=".$user_id." or team.team_user2=".$user_id." or team.team_user3=".$user_id.") order by exam.itsa_id asc")->result();
    }

    function get_csie_team($user_id){
        $this->db->from('itsa_csie');
        $this->db->where('user_id', $user_id);
        $this->db->order_by('pr_date', 'desc');
        return $this->db->get()->result();
    }
}
