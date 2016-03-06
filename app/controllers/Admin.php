<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends MY_Controller {
	function __construct(){
		parent::__construct();
		if( !$this->admin->is_login() ){
			$not_redirect = array("index","logout");
			if( !in_array($this->router->fetch_method(), $not_redirect) ){
				redirect('/admin', 'location', 301);
			}
		}
	}
	public function index(){
		
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		
		$this->form_validation->set_rules('user_login', '帳號', 'required');
		$this->form_validation->set_rules('user_pwd', '密碼', 'required');
		if ( $this->form_validation->run() ){
			$user_login = $this->input->post('user_login');
	    	$user_pwd = $this->input->post('user_pwd');

	    	if( $this->admin->login($user_login, $user_pwd) ){
	    		$this->alert->js("登入成功");
	    		redirect('/admin/dashboard', 'location', 301);
	    	}else{
	    		$this->alert->js("登入失敗");
	    	}
		}
		$this->load->view('admin/index',$this->data);
		$this->load->view('common/footer',$this->data);
	}

	public function dashboard(){
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		
		$this->load->view('common/footer',$this->data);
	}

	public function student($act=''){
		$this->assets->add_css(asset_url('style/jquery.dataTables.css'));
		$this->assets->add_js(asset_url('js/jquery.dataTables.min.js'));
		$this->assets->add_js(asset_url('js/dataTables.bootstrap.js'));

		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		switch( $act ){
			default:
			case "list":
				$this->data['students'] = $this->admin->get_students();
				$this->load->view('admin/student_list',$this->data);
			break;
			case "add":
				$this->form_validation->set_rules('user_id', '學號', 'required');
				$this->form_validation->set_rules('user_name', '姓名', 'required');
				if ( $this->form_validation->run() ){
					$user_id = $this->input->post('user_id');
					$user_name = $this->input->post('user_name');
					if( $this->admin->add_student($user_id,$user_name) ){
						$this->alert->show("s","新增成功");
					}else{
						$this->alert->show("d","新增失敗");
					}
					$this->alert->refresh(2);
				}
				$this->load->view('admin/student_add',$this->data);
			break;
			case "edit":
				$user_id = $this->input->get("id");
				$student = $this->admin->get_student($user_id);
				if ( empty($student) ){
					$this->alert->show("d","找不到學生資料");
				}else{
					$this->data['student'] = $student;
					$this->form_validation->set_rules('user_name', '姓名', 'required');
					if ( $this->form_validation->run() ){
						$user_name = $this->input->post('user_name');
						if( $this->admin->update_student($user_id,$user_name) ){
							$this->alert->show("s","更新成功");
						}else{
							$this->alert->show("d","更新失敗");
						}
						$this->alert->refresh(2);
					}
					$this->load->view('admin/student_edit',$this->data);
				}
			break;
		}

		$this->load->view('common/footer',$this->data);
	}

	public function teacher(){
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		
		$this->load->view('common/footer',$this->data);
	}

	public function context($act=''){
		$this->assets->add_css(asset_url('style/jquery.dataTables.css'));
		$this->assets->add_js(asset_url('js/jquery.dataTables.min.js'));
		$this->assets->add_js(asset_url('js/dataTables.bootstrap.js'));
		$this->assets->add_js(asset_url('js/semantic.min.js'));
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		switch( $act ){
			default:
			case "list":
				$this->data['contexts'] = $this->context->get_contexts();
				$this->load->view('admin/context_list',$this->data);
			break;
			case "add":
				$this->form_validation->set_rules('itsa_th', '競賽屆數', 'required');
				$this->form_validation->set_rules('itsa_type', '競賽類型', 'required');
				$this->form_validation->set_rules('itsa_date', '競賽日期', 'required');
				$this->form_validation->set_rules('itsa_semeter', '競賽學期', 'required');
				// $this->form_validation->set_rules('itsa_place', '競賽地點', 'required');
				// $this->form_validation->set_rules('exam_num', '競賽題數', 'required');
				// $this->form_validation->set_rules('team_num', '參賽數', 'required');
				if ( $this->form_validation->run() ){
					$itsa_th = $this->input->post("itsa_th");
					$itsa_type = $this->input->post("itsa_type");
					$itsa_date = $this->input->post("itsa_date");
					$itsa_place = $this->input->post("itsa_place");
					$itsa_semeter = $this->input->post("itsa_semeter");
					$exam_num = $this->input->post("exam_num");
					$team_num = $this->input->post("team_num");
					if( $this->admin->add_context($itsa_th,$itsa_type,$itsa_date,$itsa_place,$itsa_semeter,$exam_num,$team_num) ){
						$this->alert->show("s","更新成功");
					}else{
						$this->alert->show("d","更新失敗");
					}
					$this->alert->refresh(2);
				}
				$this->load->view('admin/context_add',$this->data);
			break;
			case "team":
				$type = $this->input->get("type");
				$itsa_id = $this->input->get("id");
				$context = $this->context->get_context($itsa_id);
				if ( empty($context) ){
					$this->alert->show("d","找不到競賽資料");
				}else{
					$this->data['students'] = $this->admin->get_students();
					$this->data['context'] = $context;
					$this->data['teams'] = $this->admin->get_context_team($itsa_id);
					$this->data['user_name'] = $this->context->get_user_name();
					$this->data['teacher_name'] = $this->context->get_teacher_name();
					switch( $type ){
						default:
						case "add":
							switch( $context->itsa_type ){
								case 1:
								case 2:
									$this->load->view('admin/context_team_itsa_add',$this->data);
									$this->load->view('admin/context_team_itsa_team',$this->data);
								break;
								case 3:
									// $this->load->view('admin/context_team_cpe_add',$this->data);
								break;
							}
						break;
						case "update":

						break;
					}

					$this->assets->add_js("//ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js",true);
					$this->assets->add_js(asset_url('js/repeatable.js'),true);
				}
			break;
			case "edit":
				$itsa_id = $this->input->get("id");
				$context = $this->context->get_context($itsa_id);
				if ( empty($context) ){
					$this->alert->show("d","找不到競賽資料");
				}else{
					$this->data['context'] = $context;
					$this->form_validation->set_rules('itsa_th', '競賽屆數', 'required');
					$this->form_validation->set_rules('itsa_type', '競賽類型', 'required');
					$this->form_validation->set_rules('itsa_date', '競賽日期', 'required');
					$this->form_validation->set_rules('itsa_place', '競賽地點', 'required');
					$this->form_validation->set_rules('itsa_semeter', '競賽學期', 'required');
					$this->form_validation->set_rules('exam_num', '競賽題數', 'required');
					$this->form_validation->set_rules('team_num', '參賽數', 'required');
					if ( $this->form_validation->run() ){
						$itsa_th = $this->input->post("itsa_th");
						$itsa_type = $this->input->post("itsa_type");
						$itsa_date = $this->input->post("itsa_date");
						$itsa_place = $this->input->post("itsa_place");
						$itsa_semeter = $this->input->post("itsa_semeter");
						$exam_num = $this->input->post("exam_num");
						$team_num = $this->input->post("team_num");
						if( $this->admin->update_context($itsa_id,$itsa_th,$itsa_type,$itsa_date,$itsa_place,$itsa_semeter,$exam_num,$team_num) ){
							$this->alert->show("s","更新成功");
						}else{
							$this->alert->show("d","更新失敗");
						}
						$this->alert->refresh(2);
					}
					$this->load->view('admin/context_edit',$this->data);
				}
			break;
		}
		$this->load->view('common/footer',$this->data);
	}

	public function team(){
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		
		$this->load->view('common/footer',$this->data);
	}

	public function oj(){
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		
		$this->load->view('common/footer',$this->data);
	}

	public function ojcontext($act=''){
		switch( $act ){
			default:
			case "list":
				$this->load->view('common/header',$this->data);
				$this->load->view('common/nav',$this->data);
				$this->load->view('admin/nav',$this->data);
				$this->data['contexts'] = $this->oj->get_contests();
				$this->load->view('admin/ojcontext_list',$this->data);
			break;
			case "view":
				$this->assets->add_css(asset_url('style/jquery.dataTables.css'));
				$this->assets->add_js(asset_url('js/jquery.dataTables.min.js'));
				$this->assets->add_js(asset_url('js/dataTables.bootstrap.js'));
				$this->assets->add_js(asset_url('js/dataTables.buttons.min.js'));
				$this->assets->add_js(asset_url('js/jszip.min.js'));
				$this->assets->add_js(asset_url('js/buttons.html5.min.js'));
				$contest_id = $this->input->get("id");
				$context = $this->oj->get_ojcontest($contest_id);
				$this->assets->set_title($context->title."練習統計資料");
				$this->load->view('common/header',$this->data);
				$this->load->view('common/nav',$this->data);
				$this->load->view('admin/nav',$this->data);
				
				if ( empty($context) ){
					$this->alert->show("d","找不到競賽資料");
				}else{
					$this->data['context'] = $context;
					$this->data['users'] = $this->oj->get_solution_user($contest_id);
					$this->load->view('admin/ojcontext_view_header',$this->data);
					$this->load->view('admin/ojcontext_view',$this->data);
				}
			break;
		}
		$this->load->view('common/footer',$this->data);
	}

	public function user(){
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('admin/nav',$this->data);
		
		$this->load->view('common/footer',$this->data);
	}

	public function json_users(){
		header('Content-Type: application/json');
		header('Content-Type: text/html; charset=utf-8');
		$query = $this->input->get("q");
		$this->data['students'] = $this->admin->get_like_students($query);
		$this->load->view('admin/json_users',$this->data);
	}
}