<?php
class Admin extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index(){
		$data['title']="管理-亞洲大學 資訊工程學系 程式設計競賽平台";  

		$this->form_validation->set_rules('user_login', '帳號', 'required');
	    $this->form_validation->set_rules('user_pwd', '密碼', 'required');
	    $this->load->view('templates/header', $data);
	    if($this->admin_model->is_login()){
	    	redirect("dashboard");
	    }
	    if ($this->form_validation->run() === FALSE){
	        $this->load->view('pages/admin', $data);
	    }else{
	    	$user_login = $this->input->post('user_login', TRUE);
	    	$user_pwd = $this->input->post('user_pwd', TRUE);
	    	$result = $this->admin_model->login($user_login, $user_pwd);
	    	if(!$result){
	    		//echo "fail";
	    	}else{
	    		redirect("dashboard");
	    	}
	    }
	    $this->load->view('templates/footer', $data);
	}

	public function dashboard(){
		if($this->admin_model->is_admin()){
			$data['title']="控制台-亞洲大學 資訊工程學系 程式設計競賽平台";  
			$this->load->view('templates/header', $data);
			$this->load->view('pages/dashboard', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/permissions_deny', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function context($type="all",$id=0,$do=""){
		if($this->admin_model->is_admin()){
			$data['title']="競賽資料管理-亞洲大學 資訊工程學系 程式設計競賽平台";
			switch($type){
				case "edit":
					$query = $this->db->query("select * from itsa_exam where itsa_id=".$this->db->escape($id)."");
					$data['exam_detail']=$query->row_array();
					if($query->num_rows()==1){
						$this->load->view('templates/header', $data);
						$this->load->view('pages/dashboard', $data);
						$this->form_validation->set_rules('itsa_th', '比賽屆數', 'required');
		    			$this->form_validation->set_rules('itsa_type', '比賽類型', 'required');
		    			if ($this->form_validation->run() === FALSE){
					        
					    }else{
					    	$itsa_th = $this->input->post('itsa_th', TRUE);
					    	$itsa_type = $this->input->post('itsa_type', TRUE);
					    	$itsa_date = $this->input->post('itsa_date', TRUE);
					    	$itsa_place = $this->input->post('itsa_place', TRUE);
					    	$exam_num = $this->input->post('exam_num', TRUE);
					    	$itsa = array(
					    		'itsa_th'=>$itsa_th,
					    		'itsa_type'=>$itsa_type,
					    		'itsa_date'=>$itsa_date,
					    		'itsa_place'=>$itsa_place,
					    		'exam_num'=>$exam_num
					    	);
					    	//print_r($itsa);
					    	if($this->db->update('itsa_exam',$itsa,"itsa_id = ".$this->db->escape($id)."")){
					    		$data['message']['class']="green";
					    		$data['message']['content']="成功更新比賽資訊";
					    	}else{
					    		$data['message']['class']="red";
					    		$data['message']['content']="更新比賽資訊失敗";
					    	}
					    	$data['message']['time']=2;

					    	$this->load->view('templates/message', $data);
					    }
						$this->load->view('pages/admin_contextedit', $data);
						$this->load->view('templates/footer', $data);
					}else{
						show_404();
					}
					
				break;
				case "delete":
					$query = $this->db->query("select * from itsa_exam where itsa_id=".$this->db->escape($id)."");
					$data['exam_detail']=$query->result_array();
					$this->load->view('templates/header', $data);
					$this->load->view('pages/dashboard', $data);
					if(count($data['exam_detail'])==1){
						if($this->db->delete('itsa_exam', array('itsa_id' => $id))){
				    		$data['message']['class']="blue";
				    		$data['message']['content']="成功刪除一筆比賽資訊";
				    	}else{
				    		$data['message']['class']="red";
				    		$data['message']['content']="刪除一筆比賽資訊失敗";
				    	}
				    	$data['message']['url']="/itsa/index.php/admin/context/";
				    	$data['message']['time']="2";
				    	$this->load->view('templates/message', $data);
					}else{
						show_404();
					}
					$this->load->view('templates/footer', $data);
				break;
				case "team":
					$query = $this->db->query("select * from itsa_exam where itsa_id=".$this->db->escape($id)."");
					$data['exam_detail']=$query->row_array();
					$this->load->view('templates/header', $data);
					$this->load->view('pages/dashboard', $data);

					if($query->num_rows()==1){
						$query = $this->db->query("select * from itsa_team where team_examid=".$this->db->escape($id)." order by team_rank asc");
						$data['itsa_team']=$query->result_array();
						$query = $this->db->query("select * from itsa_user");
						$data['itsa_user']=$query->result_array();
						$query = $this->db->query("select * from team_teacher");
						$data['team_teacher']=$query->result_array();
						switch($do){
							case "update":
								
								if ($this->form_validation->run() === FALSE){
									switch($this->input->post('action')){
										case "update":
											if($data['exam_detail']['itsa_type']==1 || $data['exam_detail']['itsa_type']==2){
												$this->form_validation->set_rules('team_name[]', '隊名', 'required');
												$this->form_validation->set_rules('team_teacher[]', '指導教練', 'required');
											}
											$this->form_validation->set_rules('team[][team_user1]', '隊員(一)', 'required');
											$this->form_validation->set_rules('team[][team_solved]', '解題題數', 'required');
											$this->form_validation->set_rules('team[][team_rank]', '排名', 'required');
											$this->form_validation->set_rules('team[][team_time]', '解題時間', 'required');
											
											if($data['exam_detail']['itsa_type']==1 || $data['exam_detail']['itsa_type']==2){
												if( empty($this->input->post('team_user2')) || $this->input->post('team_user2')==0){
													$team_user2=NULL;
												}else{
													$team_user2=$this->input->post('team_user2');
												}
												if( empty($this->input->post('team_user3')) || $this->input->post('team_user3')==0){
													$team_user3=NULL;
												}else{
													$team_user3=$this->input->post('team_user3');
												}
											}
											foreach ($this->input->post("team") as $team_id => $v) {
												$this->db->set("team_user1", $v['team_user1']);
												$this->db->set("team_solved", $v['team_solved']);
												$this->db->set("team_rank", $v['team_rank']);
												$this->db->set("team_time", $v['team_time']);
												$this->db->set("tean_note", $v['tean_note']);

												if($data['exam_detail']['itsa_type']==1 || $data['exam_detail']['itsa_type']==2){
													if( empty($v['team_user2']) || $v['team_user2']==0 || !isset($v['team_user2'])){
														$this->db->set("team_user2", NULL);
													}else{
														$this->db->set("team_user2", $v['team_user2']);
													}
													if( empty($v['team_user3']) ||$v['team_user3']==0 || !isset($v['team_user3'])){
														$this->db->set("team_user3", NULL);
													}else{
														$this->db->set("team_user3", $v['team_user3']);
													}
													$this->db->set("team_name", $v['team_name']);
													$this->db->set("team_teacher", $v['team_teacher']);
												}

												$this->db->where('team_id', $team_id);
												$this->db->where('team_examid', $id);
												$this->db->update('itsa_team');

												$data['message']['class']="green";
									    		$data['message']['content']="成功更新隊伍資訊資訊";
									    		$data['message']['url']="admin/context/team/".$id;
									    		$data['message']['time']=2;
									    		$this->load->view('templates/message', $data);
											}
											/*
											if($data['exam_detail']['itsa_type']==1 || $data['exam_detail']['itsa_type']==2){
												if( empty($this->input->post('team_user2')) || $this->input->post('team_user2')==0){
													$team_user2=NULL;
												}else{
													$team_user2=$this->input->post('team_user2');
												}
												if( empty($this->input->post('team_user3')) || $this->input->post('team_user3')==0){
													$team_user3=NULL;
												}else{
													$team_user3=$this->input->post('team_user3');
												}
												$itsa_team = array(
													'team_name'=>$this->input->post('team_name'),
										    		'team_user1'=>$this->input->post('team_user1'),
										    		'team_user2'=>$team_user2,
										    		'team_user3'=>$team_user3,
										    		'team_solved'=>$this->input->post('team_solved'),
										    		'team_rank'=>$this->input->post('team_rank'),
										    		'team_time'=>$this->input->post('team_time'),
										    		'team_teacher'=>$this->input->post('team_teacher'),
										    		'tean_note'=>$this->input->post('tean_note'),
										    		'team_examid'=>$data['exam_detail']['itsa_id']
										    	);
											}else{
												$itsa_team = array(
										    		'team_user1'=>$this->input->post('team_user1'),
										    		'team_solved'=>$this->input->post('team_solved'),
										    		'team_rank'=>$this->input->post('team_rank'),
										    		'team_time'=>$this->input->post('team_time'),
										    		'tean_note'=>$this->input->post('tean_note'),
										    		'team_examid'=>$data['exam_detail']['itsa_id']
										    	);
											}*/
											/*if($this->db->update('itsa_team',$itsa_team, array('team_examid' => $id,'team_id'=>$this->input->post('team_id')))){
									    		$data['message']['class']="green";
									    		$data['message']['content']="成功更新比賽資訊";
									    	}else{
									    		$data['message']['class']="red";
									    		$data['message']['content']="更新比賽資訊失敗";
									    	}
									    	$data['message']['time']=2;

									    	$this->load->view('templates/message', $data);
											*/
											
										break;
										case "delete":
											echo "<pre>";
											print_r($this->input->post());
											echo "</pre>";

											foreach ($this->input->post("tid") as $key => $team_id) {
												if($this->db->delete('itsa_team', array('team_examid' => $id,'team_id'=>$team_id))){
										    		$data['message']['class']="blue";
										    		$data['message']['content']="成功刪除一筆隊伍資訊";
										    	}else{
										    		$data['message']['class']="red";
										    		$data['message']['content']="刪除一筆隊伍資訊失敗";
										    	}
										    	$data['message']['url']="admin/context/team/".$id;
										    	$data['message']['time']=2;
										    	$this->load->view('templates/message', $data);
											}
											
										break;
									}
								}else{

								}
							break;
							case "new":
								if($data['exam_detail']['itsa_type']==1 || $data['exam_detail']['itsa_type']==2){
									$this->form_validation->set_rules('team_name', '隊名', 'required');
									$this->form_validation->set_rules('team_teacher', '指導教練', 'required');
								}
								$this->form_validation->set_rules('team_user1', '隊員(一)', 'required');
								$this->form_validation->set_rules('team_solved', '解題題數', 'required');
								$this->form_validation->set_rules('team_rank', '排名', 'required');
								$this->form_validation->set_rules('team_time', '解題時間', 'required');
								
								if ($this->form_validation->run() === FALSE){

								}else{
									if($data['exam_detail']['itsa_type']==1 || $data['exam_detail']['itsa_type']==2){
										if( empty($this->input->post('team_user2')) || $this->input->post('team_user2')==0){
											$team_user2=NULL;
										}else{
											$team_user2=$this->input->post('team_user2');
										}
										if( empty($this->input->post('team_user3')) || $this->input->post('team_user3')==0){
											$team_user3=NULL;
										}else{
											$team_user3=$this->input->post('team_user3');
										}
										$itsa_team = array(
											'team_name'=>$this->input->post('team_name'),
								    		'team_user1'=>$this->input->post('team_user1'),
								    		'team_user2'=>$team_user2,
								    		'team_user3'=>$team_user3,
								    		'team_solved'=>$this->input->post('team_solved'),
								    		'team_rank'=>$this->input->post('team_rank'),
								    		'team_time'=>$this->input->post('team_time'),
								    		'team_teacher'=>$this->input->post('team_teacher'),
								    		'tean_note'=>$this->input->post('tean_note'),
								    		'team_examid'=>$data['exam_detail']['itsa_id']
								    	);
									}else{
										$itsa_team = array(
								    		'team_user1'=>$this->input->post('team_user1'),
								    		'team_solved'=>$this->input->post('team_solved'),
								    		'team_rank'=>$this->input->post('team_rank'),
								    		'team_time'=>$this->input->post('team_time'),
								    		'tean_note'=>$this->input->post('tean_note'),
								    		'team_examid'=>$data['exam_detail']['itsa_id']
								    	);
									}
									if($this->db->insert('itsa_team', $itsa_team)){
							    		$data['message']['class']="green";
							    		$data['message']['content']="成功新增一筆隊伍資訊";
							    	}else{
							    		$data['message']['class']="red";
							    		$data['message']['content']="新增一筆隊伍資訊失敗";
							    	}
							    	$data['message']['time']=2;
							    	$this->load->view('templates/message', $data);
								}
								
							break;
						}
						$this->load->view('pages/admin_contextteam_new', $data);
						$this->load->view('pages/admin_contextteam', $data);
						$this->load->view('templates/footer', $data);
					}else{
						show_404();
					}
				break;
				case "new":
					$this->load->view('templates/header', $data);
					$this->load->view('pages/dashboard', $data);
					$this->form_validation->set_rules('itsa_th', '比賽屆數', 'required');
	    			$this->form_validation->set_rules('itsa_type', '比賽類型', 'required');
	    			if ($this->form_validation->run() === FALSE){
				        
				    }else{
				    	$itsa_th = $this->input->post('itsa_th', TRUE);
				    	$itsa_type = $this->input->post('itsa_type', TRUE);
				    	$itsa_date = $this->input->post('itsa_date', TRUE);
				    	$itsa_place = $this->input->post('itsa_place', TRUE);
				    	$exam_num = $this->input->post('exam_num', TRUE);
				    	$itsa = array(
				    		'itsa_th'=>$itsa_th,
				    		'itsa_type'=>$itsa_type,
				    		'itsa_date'=>$itsa_date,
				    		'itsa_place'=>$itsa_place,
				    		'exam_num'=>$exam_num
				    	);
				    	//print_r($itsa);
				    	if($this->db->insert('itsa_exam', $itsa)){
				    		$data['message']['class']="green";
				    		$data['message']['content']="成功新增一筆比賽資訊";
				    	}else{
				    		$data['message']['class']="red";
				    		$data['message']['content']="新增一筆比賽資訊失敗";
				    	}
				    	$this->load->view('templates/message', $data);
				    }
					$this->load->view('pages/admin_contextnew', $data);
					$this->load->view('templates/footer', $data);
				break;
				case "all":
				default:
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
					$this->load->view('pages/dashboard', $data);
					$this->load->view('pages/admin_context', $data);
					$this->load->view('templates/footer', $data);
			}
			
		}else{
			$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/permissions_deny', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	
	public function student($act="all",$id=0){
		if($this->admin_model->is_admin()){
			$data['title']="學生管理-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/dashboard', $data);
			switch($act){
				case "edit":

				break;
				case "new":

				break;
			}
			$query = $this->db->query("select * from itsa_user order by user_id asc");
			//$query = $this->db->order_by("", "desc"); 
			$data['itsa_user']=$query->result_array();
			$this->load->view('pages/admin_studentnew', $data);
			$this->load->view('pages/student', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/permissions_deny', $data);
			$this->load->view('templates/footer', $data);
		}

	}
	public function teacher($id){
		/*$query = $this->db->query("select * from itsa_exam where itsa_id=".$this->db->escape($id)."");
		$data['exam_detail']=$query->result_array();*/
		if($this->admin_model->is_admin()){
			$data['title']="競賽隊伍指導老師管理-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/dashboard', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/permissions_deny', $data);
			$this->load->view('templates/footer', $data);
		}
	}
	public function logout(){
		
		if($this->admin_model->is_admin()){
			$data['title']="登出-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->session->sess_destroy();
			$data['message']['class']="green";
			$data['message']['content']="登出成功";
							    	
	    	$data['message']['time']=2;
	    	$this->load->view('templates/message', $data);
			$this->load->view('templates/footer', $data);
		}else{
			$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/permissions_deny', $data);
			$this->load->view('templates/footer', $data);
		}
	}

	public function update_user(){
		if($this->admin_model->is_admin()){
			if($this->input->is_ajax_request()){
				$query = $this->db->query("select * from itsa_user order by user_id asc");
				//$query = $this->db->order_by("", "desc"); 
				$data['itsa_user']=$query->result_array();
				$this->load->view('pages/ajax_user', $data);
			}else{
				$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
				$this->load->view('templates/header', $data);
				$this->load->view('pages/permissions_deny', $data);
				$this->load->view('templates/footer', $data);
			}
		}else{
			$data['title']="無權操作-亞洲大學 資訊工程學系 程式設計競賽平台";
			$this->load->view('templates/header', $data);
			$this->load->view('pages/permissions_deny', $data);
			$this->load->view('templates/footer', $data);
		}
	}
}