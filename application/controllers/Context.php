<?php
class Context extends CI_Controller {

	public function index(){
		$data['title']="首頁-亞洲大學 資訊工程學系 程式設計競賽平台";
		
		$query = $this->db->query("select * from itsa_exam order by itsa_id desc");
		//$query = $this->db->order_by("", "desc"); 
		$data['exam_th']=$query->result_array();

		$query = $this->db->query("select team_examid, count(team_id) as count from itsa_team group by team_examid");
		$exam_count=$query->result_array();
		$exam_count_array=array();
		foreach($exam_count as $key => $v){
			$exam_count_array[$v['team_examid']]=$v['count'];
		}
		$data['exam_count']=$exam_count_array;

		$this->load->view('templates/header', $data);
	    $this->load->view('pages/index', $data);
	    $this->load->view('templates/footer', $data);        
	}
	public function detail($id){
		$data['title']="競賽資料-亞洲大學 資訊工程學系 程式設計競賽平台";

		$query = $this->db->query("select * from itsa_exam where itsa_id=".$this->db->escape($id)."");
		$data['exam_detail']=$query->result_array();
		if(count($data['exam_detail'])==1){
			$query = $this->db->query("select * from itsa_team where team_examid=".$this->db->escape($id)." order by team_rank asc");
			$data['itsa_team']=$query->result_array();

			$query = $this->db->query("select avg(team_solved) as team_avg from itsa_team where team_examid=".$this->db->escape($id)."");
			$data['team_solved']=$query->result();

			$query = $this->db->query("select max(team_solved) as bestsolved from itsa_team where team_examid=".$this->db->escape($id)."");
			$data['team_bestsolved']=$query->result();

			//std id to name
			$query = $this->db->get('itsa_user');
			$user=$query->result_array();
			$user_array=array();
			foreach ($user as $key => $value) {
				$user_array[$value['user_id']]=$value['user_name'];
			}
			$data['user']=$user_array;

			//teacher id to name
			$query = $this->db->get('team_teacher');
			$teacher=$query->result_array();
			$teacher_array=array();
			foreach ($teacher as $key => $value) {
				$teacher_array[$value['user_login']]=$value['user_name'];
			}
			$data['teacher']=$teacher_array;
			//print_r($teacher_array);
			
			$this->load->view('templates/header', $data);
		    $this->load->view('pages/detail', $data);
		    $this->load->view('templates/footer', $data); 
	    }else{
	    	show_404();
	    }
	}
	public function user($id){
		$query = $this->db->query("select * from itsa_user where user_id=".$this->db->escape($id)."");
		$user=$query->result_array();
		
		if(count($user)==1){
			$query = $this->db->query("select count(*) as count,max(team_solved) as solved ,min(team_rank) as rank,min(team_time) as teamtime ,avg(team_time) as avgtime,avg(team_solved) as avgsolved from itsa_team where team_user1=".$this->db->escape($id)." or team_user2=".$this->db->escape($id)." or team_user3=".$this->db->escape($id)."");
			$stat=$query->result_array();
			//print_r($stat);
			$data['stat']=$stat[0];
			$data['title']=$user[0]['user_id']." ".$user[0]['user_name']." 參賽資料-亞洲大學 資訊工程學系 程式設計競賽平台";
			$data['user']=$user[0];

			$query = $this->db->query("select * from itsa_team as team join itsa_exam as exam on team.team_examid=exam.itsa_id where team.team_user1=".$this->db->escape($id)." or team.team_user2=".$this->db->escape($id)." or team.team_user3=".$this->db->escape($id)." and team_time>0");
			$context=$query->result_array();
			$data['context']=$context;

			//std id to name
			$query = $this->db->get('itsa_user');
			$std=$query->result_array();
			$std_array=array();
			foreach ($std as $key => $value) {
				$std_array[$value['user_id']]=$value['user_name'];
			}
			$data['std']=$std_array;

			//teacher id to name
			$query = $this->db->get('team_teacher');
			$teacher=$query->result_array();
			$teacher_array=array();
			foreach ($teacher as $key => $value) {
				$teacher_array[$value['user_login']]=$value['user_name'];
			}
			$data['teacher']=$teacher_array;

			$this->load->view('templates/header', $data);
		    $this->load->view('pages/user', $data);
		    $this->load->view('templates/footer', $data);
	    }else{
	    	show_404();
	    }
	}
	public function teacher($id){
		$query = $this->db->query("select * from team_teacher where user_login=".$this->db->escape($id)."");
		$teacher=$query->result_array();
		if(count($teacher)==1){
			$query = $this->db->query("select count(*) as count,max(team_solved) as solved ,min(team_rank) as rank,min(team_time) as teamtime ,avg(team_time) as avgtime,avg(team_solved) as avgsolved from itsa_team where team_teacher=".$this->db->escape($id)." and team_time>0");
			$stat=$query->result_array();
			//print_r($stat);
			$data['stat']=$stat[0];


			//std id to name
			$query = $this->db->get('itsa_user');
			$std=$query->result_array();
			$std_array=array();
			foreach ($std as $key => $value) {
				$std_array[$value['user_id']]=$value['user_name'];
			}
			$data['std']=$std_array;

			$query = $this->db->query("select * from itsa_team as team join itsa_exam as exam on team.team_examid=exam.itsa_id where team_teacher=".$this->db->escape($id)."");
			$team=$query->result_array();

			$data['team']=$team;
			$data['teacher']=$teacher[0];
			$data['title']=$teacher[0]['user_name']."老師 指導教練資料-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
		    $this->load->view('pages/teacher', $data);
		    $this->load->view('templates/footer', $data);
		}else{
			show_404();
		}
	}

}