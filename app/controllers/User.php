<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends MY_Controller {
	public function index($user_id = NULL){
		$this->data['user'] = $this->context->get_user($user_id);
		if ( empty($this->data['user']) ){
			show_404();
        }
        $this->data['user_name'] = $this->context->get_user_name();
		$this->data['teacher_name'] = $this->context->get_teacher_name();

        $this->data['history_itsa'] = $this->context->get_user_context("itsa",$user_id);
        $this->data['history_ptc'] = $this->context->get_user_context("ptc",$user_id);
        $this->data['history_cpe'] = $this->context->get_user_context("cpe",$user_id);
        $this->data['solves'] = $this->oj->get_user_solve($user_id);
        $this->data['csie_teams'] = $this->context->get_csie_team($user_id);

        $this->assets->set_title($this->data['user']->user_id." ".$this->data['user']->user_name." 參賽紀錄");

		$this->load->view('common/header',$this->data);
		$this->load->view('common/nav',$this->data);
		$this->load->view('user/index',$this->data);
		$this->load->view('user/index_oj',$this->data);
		$this->load->view('user/index_itsa',$this->data);
		$this->load->view('user/index_ptc',$this->data);
		$this->load->view('user/index_cpe',$this->data);
		$this->load->view('user/index_csie',$this->data);
		$this->load->view('common/footer',$this->data);
	}
}