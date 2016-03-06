<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Onlinejude_model extends CI_Model {
	function __construct(){
		parent::__construct();
    }
    function adduser($user_id,$user_email,$password,$nick,$defunct="Y"){
    	$user = array(
			"user_id"    => $user_id,
			"email"      => $user_email,
			"ip"         => $this->input->ip_address(),
			"accesstime" => date('Y-m-d H:i:s'),
			"password"   => $this->pwGen($password), 
			"reg_time"   => date('Y-m-d H:i:s'),
			"nick"       => $nick,
			"school"     => "亞洲大學",
			"defunct"    => $defunct
		);
		return $this->db->insert('users', $user);
    }

    function pwGen($password,$md5ed=False){
		if (!$md5ed) $password=md5($password);
		$salt = sha1(rand());
		$salt = substr($salt, 0, 4);
		$hash = base64_encode( sha1($password . $salt, true) . $salt ); 
		return $hash; 
	}

	function userid_exit($user_id){
		$this->db->from('itsa_user');
		$this->db->where("user_id",$user_id);
		return $this->db->count_all_results() >0;
	}

	function userid_isnotopen($user_id){
		$this->db->from('users');
		$this->db->where("user_id",$user_id);
		$this->db->where("defunct","Y");
		return $this->db->count_all_results() >0;
	}

	function ojuserid_exit($user_id){
		$this->db->from('users');
		$this->db->where("user_id",$user_id);
		return $this->db->count_all_results() >0;
	}

	function update_ojacc($user_id){
		$user = array(
			"user_id" => $user_id,
			"oj_acc" => $user_id
		);
		$this->db->where('user_id', $user_id);
		if( $this->db->update('itsa_user', $user) ){
			return true;
		}else{
			return false;
		}
	}

	function add_auth($user_id,$ojauth_token){
		$auth = array(
			"ojauth_token" => $ojauth_token,
			"user_id"      => $user_id,
			"ojauth_time"  => time()+3600
		);

		return $this->db->insert('itsa_ojauth', $auth);
	}

	function checkauth($user_id){
		$this->db->from('itsa_ojauth');
		$this->db->where('user_id', $user_id);
		$this->db->where('ojauth_time >',time());
		if( $this->db->count_all_results() >0 ){
            return true;
        }else{
            return false;
        }
	}

	function check_token($user_id,$ojauth_token){
		$this->db->from('itsa_ojauth');
		$this->db->where('user_id', $user_id);
		$this->db->where('ojauth_token', $ojauth_token);
		$this->db->where('ojauth_time >',time());
		if( $this->db->count_all_results() >0 ){
			if( is_numeric($user_id) ){
				$type='s';
			}else{
				$type='t';
			}
            return $this->set_open($user_id,$type);
        }else{
            return false;
        }
	}

	function set_open($user_id,$type='s'){
		$itsa_user = array(
			"ojauth_status"=>1
		);
		$this->db->where('user_id', $user_id);
		$this->db->update('itsa_ojauth', $itsa_user);
		$user = array(
			"user_status"=>1,
			"defunct" => "N"
		);
		switch($type){
			case "t":
				$this->db->where('email', $user_id.'@asia.edu.tw');
				if( $this->db->update('users', $user) ){
					return true;
				}else{
					return false;
				}
			break;
			case "s":
				$this->db->where('email', $user_id.'@live.asia.edu.tw');
				if( $this->db->update('users', $user) ){
					return true;
				}else{
					return false;
				}
			break;
		}
	}
	/**
	 * Generate an encryption key for CodeIgniter.
	 * http://codeigniter.com/user_guide/libraries/encryption.html
	 */
	// http://www.itnewb.com/v/Generating-Session-IDs-and-Random-Passwords-with-PHP
	function generate_token($len = 10){
		// Array of potential characters, shuffled.
		$chars = array(
			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 
			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 
			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
		);
		shuffle($chars);
		$num_chars = count($chars) - 1;
		$token = '';
		// Create random token at the specified length.
		for ($i = 0; $i < $len; $i++)
		{
			$token .= $chars[mt_rand(0, $num_chars)];
		}
		return $token;
	}

	function get_contests(){
		$this->db->from('contest');
		$query = $this->db->get();
		return $query->result();
	}

	function get_ojcontest($contest_id){
		$this->db->from('contest');
		$this->db->where('contest_id', $contest_id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_problems(){
		$this->db->from('problem');
		$this->db->where('defunct', "N");
		$query = $this->db->get();
		return $query->result();
	}

	function get_problem($problem_id){
		$this->db->from('problem');
		$this->db->where('problem_id', $problem_id);
		$this->db->where('defunct', "N");
		$query = $this->db->get();
		return $query->row();
	}

	function get_problem_solve($problem_id){
		$this->db->from('solution');
		$this->db->join('users',"solution.user_id = users.user_id");
		$this->db->where('result', 4);
		$this->db->where('defunct', "N");
		$this->db->where('problem_id', $problem_id);
		$query = $this->db->get();
		return $query->result();
	}

	function get_user_solve($user_id){
		$this->db->select('distinct(problem.problem_id),problem.title,problem.in_date');
		$this->db->from('solution');
		$this->db->join('users',"solution.user_id = users.user_id");
		$this->db->join('problem',"solution.problem_id = problem.problem_id");
		$this->db->where('result', 4);
		$this->db->where('users.defunct', "N");
		$this->db->where('users.email', $user_id."@live.asia.edu.tw");
		$query = $this->db->get();
		return $query->result();
	}

	function get_user($user_id){
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		$query = $this->db->get();
		return $query->row();
	}

	function get_users(){
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result();
	}

	function get_solution_user($contest_id){
		$this->db->select('distinct(solution.problem_id),solution.user_id,users.nick,count(users.user_id) as usv,users.email');
		$this->db->from('solution');
		$this->db->join('contest','solution.contest_id = contest.contest_id');
		$this->db->join('users','users.user_id = solution.user_id');
		$this->db->group_by("solution.user_id");
		$this->db->where('contest.contest_id', $contest_id);
		$this->db->where('solution.result', 4);
		$query = $this->db->get();
		return $query->result();
	}

	function sendmail($user_id,$user_name,$user_pass){
		$ojauth_token = hash('sha256',$this->generate_token());
		$this->add_auth($user_id,$ojauth_token);
		$link = site_url("oj/auth/".$user_id."/".$ojauth_token);

		$site_name = $this->config->item('site_name');
		$message = $user_name.'，您好<br><br>
    	您在“'.$site_name.'”的帳號已經建立。<br><br>
    	您目前的登入資訊如下：<br>
    	帳號：'.$user_id.'<br>
    	密碼：'.$user_pass.'<br><br>
    	要開始使用“'.$site_name.'”請透過連結啟用帳號：<br><a href="'.$link.'">'.$link.'</a><br><br>
    	在大部分的郵件軟體中，上面的網址應該會自動以連結格式呈現，您可以直接點選；如果沒有，您可以將上面網址直接貼到瀏覽器的網址列中。<br><br>
    	'.$site_name.' 管理員';

    	$this->email->from('asiaccsadm05@gmail.com', $site_name);
		$this->email->to($user_id.'@live.asia.edu.tw');
		$this->email->reply_to('asiaccsadm05@gmail.com', 'Adminstritor');
		$this->email->subject('線上練習認證信');
		$this->email->message($message);
		return $this->email->send();
	}
}
?>