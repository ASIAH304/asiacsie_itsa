<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Oj extends MY_Controller {

	public function index(){
		$this->assets->set_title("線上練習註冊");
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);

		$this->form_validation->set_rules('user_id', '學號', 'required');
		$this->form_validation->set_rules('user_pwd', '密碼', 'required');
	    $this->form_validation->set_rules('user_pwd2', '重覆輸入密碼', 'required|matches[user_pwd]');
	    $this->form_validation->set_rules('user_name', '姓名', 'required');
	    
	    if ( $this->form_validation->run() ){
	    	$user_pwd   = $this->input->post('user_pwd');
			$user_id    = $this->input->post('user_id');
			$user_name  = $this->input->post('user_name');
			$user_type  = $this->input->post('user_type');
			$user_email = $user_id ."@live.asia.edu.tw";
			if( $this->oj->ojuserid_exit($user_id) ){
				$this->alert->show("d","帳號已存在，若不是您註冊，請洽系統管理者");
			}else{
				if( $this->oj->adduser($user_id,$user_email,$user_pwd,$user_name) ){
					if($this->oj->userid_exit($user_id)){ // 更新 ITSA 學生資料庫
						$this->oj->update_ojacc($user_id);
					}else{
						$this->admin->add_student($user_id,$user_name);
					}
					if( $this->oj->sendmail($user_id,$user_name,$user_pwd) ){
						$this->alert->js('註冊帳號成功，請至學校 網路郵局 收取驗證信');
						$this->alert->show("s",'註冊帳號成功，請至學校 <a href="http://mail.live.asia.edu.tw/">網路郵局</a> 收取驗證信');
					}else{
						$this->alert->js('驗證信發送失敗，請洽系統管理者開通');
						$this->alert->show("d",'驗證信發送失敗，請洽系統管理者開通');
					}
				}else{
					$this->alert->show("d","新增帳號失敗，請洽系統管者");
				}
			}
	    }
		$this->load->view('oj/index',$this->data);
		$this->load->view('common/footer',$this->data);
	}

	public function auth($user_id="",$ojauth_token=""){
		if( empty($user_id) || empty($ojauth_token) ){
			redirect('oj', 'location', 301);
		}
		$this->assets->set_title("線上練習開通");
		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		if($this->oj->check_token($user_id,$ojauth_token)){
			$this->alert->js("線上練習平台帳號已開通","http://120.108.113.80");
			$this->alert->refresh(1);
		}else{
			$this->alert->js("線上練習平台帳號開通失敗，請洽系統管理員手動開通帳號");
			$this->alert->show("d","線上練習平台帳號開通失敗，請洽系統管理員手動開通帳號");
		}
		
		$this->load->view('common/footer',$this->data);
	}

	// public function passwd(){
	// 	$this->assets->set_title("線上練習 忘記密碼");
	// 	$this->load->view('common/header',$this->data);
	// 	$this->load->view('common/nav',$this->data);

	// 	$this->form_validation->set_rules('user_id', '學號', 'required');
	//     if ( $this->form_validation->run() ){
	// 		$user_id = $this->input->post('user_id');
	// 		if( $this->oj->userid_isnotopen($user_id) ){
	// 			if( $this->oj->sendmail($user_id,$user_name,$user_pwd) ){
	// 				$this->alert->js('註冊帳號成功，請至學校 網路郵局 收取驗證信');
	// 				$this->alert->show("s",'註冊帳號成功，請至學校 <a href="http://mail.live.asia.edu.tw/">網路郵局</a> 收取驗證信');
	// 			}else{
	// 				$this->alert->js('驗證信發送失敗，請洽系統管理者開通');
	// 				$this->alert->show("d",'驗證信發送失敗，請洽系統管理者開通');
	// 			}
	// 		}else{
	// 			$this->alert->js("您尚未註冊帳號，或帳號已經啟用過");
	// 		}
	// 	}
	// 	$this->load->view('oj/resend',$this->data);
	// 	$this->load->view('common/footer',$this->data);
	// }

	// public function resend(){
	// 	$this->assets->set_title("線上練習開通");
	// 	$this->load->view('common/header',$this->data);
	// 	$this->load->view('common/nav',$this->data);

	// 	$this->form_validation->set_rules('user_id', '學號', 'required');
	//     if ( $this->form_validation->run() ){
	// 		$user_id = $this->input->post('user_id');
	// 		if( $this->oj->userid_isnotopen($user_id) ){
	// 			if( $this->oj->sendmail($user_id,$user_name,$user_pwd) ){
	// 				$this->alert->js('註冊帳號成功，請至學校 網路郵局 收取驗證信');
	// 				$this->alert->show("s",'註冊帳號成功，請至學校 <a href="http://mail.live.asia.edu.tw/">網路郵局</a> 收取驗證信');
	// 			}else{
	// 				$this->alert->js('驗證信發送失敗，請洽系統管理者開通');
	// 				$this->alert->show("d",'驗證信發送失敗，請洽系統管理者開通');
	// 			}
	// 		}else{
	// 			$this->alert->js("您尚未註冊帳號，或帳號已經啟用過");
	// 		}
	// 	}
	// 	$this->load->view('oj/resend',$this->data);
	// 	$this->load->view('common/footer',$this->data);
	// }
}